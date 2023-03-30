<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');


/**
 * Ce2bs Controller
 *
 * @property Ce2b $Ce2b
 */
class Ce2bsController extends AppController
{

    public $components = array('Search.Prg');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    /**
     * index method
     */
    /*public function index() {
        $this->Aefi->recursive = 0;
        $this->set('aefis', $this->paginate());
    }*/

    // Short Term Goal 
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function reporter_index()
    {
        # code...
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Ce2b->parseCriteria($this->passedArgs);
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Ce2b.user_id'] = $this->Auth->User('id');
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $criteria['Ce2b.submitted'] = array(2);
        } else {
            if (isset($this->request->query['submitted'])) {
                if ($this->request->query['submitted'] == 1) {
                    $criteria['Ce2b.submitted'] = array(0, 1);
                } else {
                    $criteria['Ce2b.submitted'] = array(2, 3);
                }
            } else {
                $criteria['Ce2b.submitted'] = array(0, 1, 2, 3);
            }
        }
        // add deleted condition to criteria
        $criteria['Ce2b.deleted'] = false;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Ce2b.created' => 'desc');
        $this->set('ce2bs', Sanitize::clean($this->paginate(), array('encode' => false)));
        $this->set('page_options', $this->page_options);
    }

    public function reporter_add()
    {
        # code...
        $this->Ce2b->create();
        $this->Ce2b->save(['Ce2b' => [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new',
            'reporter_email' => $this->Auth->User('email'),
            'designation_id' => $this->Auth->User('designation_id'),
            'reporter_designation' => $this->Auth->User('designation_id'),
            'county_id' => $this->Auth->User('county_id'),
            'reporter_name' => $this->Auth->User('name'),
            'reporter_email' => $this->Auth->User('email'),
            'reporter_phone' => $this->Auth->User('phone_no'),
        ]], false);
        $this->Session->setFlash(__('The Ce2b has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Ce2b->id));
    }

    public function generateReferenceNumber()
    {
        $count = $this->Ce2b->find('count',  array(
            'fields' => 'Ce2b.reference_no',
            'conditions' => array(
                'Ce2b.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Ce2b.reference_no !=' => 'new'
            )
        ));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $reference = 'CE2B/' . date('Y') . '/' . $count;
        //ensure that the reference number is unique
        $exists = $this->Ce2b->find('count',  array(
            'fields' => 'Ce2b.reference_no',
            'conditions' => array('Ce2b.reference_no' => $reference)
        ));
        if ($exists > 0) {
            $reference = $this->generateReferenceNumber();
        }

        return $reference;
    }

    public function reporter_edit($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid Ce2b'));
        }
        $ce2b = $this->Ce2b->read(null, $id);
        if ($ce2b['Ce2b']['submitted'] > 1) {
            $this->Session->setFlash(__('The Ce2b has been submitted'), 'alerts/flash_info');
            $this->redirect(array('action' => 'view', $this->Ce2b->id));
        }
        if ($ce2b['Ce2b']['user_id'] !== $this->Auth->user('id')) {
            $this->Session->setFlash(__('You don\'t have permission to edit this Ce2b!!'), 'alerts/flash_error');
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';
            }
            if ($this->Ce2b->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Ce2b->saveField('submitted', 2);
                    $this->Ce2b->saveField('submitted_date', date("Y-m-d H:i:s"));
                    //lucian
                    // if(empty($sadr->reference_no)) {
                    if (!empty($ce2b['Ce2b']['reference_no']) && $ce2b['Ce2b']['reference_no'] == 'new') {
                        $reference = $this->generateReferenceNumber();
                        $this->Ce2b->saveField('reference_no', $reference);
                    }
                    //bokelo
                    // $ce2b = $this->Ce2b->read(null, $id);

                    // //******************       Send Email and Notifications to Reporter and Managers          *****************************
                    // $this->loadModel('Message');
                    // $html = new HtmlHelper(new ThemeView());
                    // $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_ce2b_submit')));
                    // $variables = array(
                    //     'name' => $this->Auth->User('name'), 'reference_no' => $ce2b['Ce2b']['reference_no'],
                    //     'reference_link' => $html->link(
                    //         $ce2b['Ce2b']['reference_no'],
                    //         array('controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'reporter' => true, 'full_base' => true),
                    //         array('escape' => false)
                    //     ),
                    //     'modified' => $ce2b['Ce2b']['modified']
                    // );
                    // $datum = array(
                    //     'email' => $ce2b['Ce2b']['reporter_email'],
                    //     'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_ce2b_submit', 'model' => 'Ce2b',
                    //     'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    //     'message' => CakeText::insert($message['Message']['content'], $variables)
                    // );

                    // $this->loadModel('Queue.QueuedTask');
                    // $this->QueuedTask->createJob('GenericEmail', $datum);
                    // $this->QueuedTask->createJob('GenericNotification', $datum);


                    // //Send SMS
                    // if (!empty($ce2b['Ce2b']['reporter_phone']) && strlen(substr($ce2b['Ce2b']['reporter_phone'], -9)) == 9 && is_numeric(substr($ce2b['Ce2b']['reporter_phone'], -9))) {
                    //     $datum['phone'] = '254' . substr($ce2b['Ce2b']['reporter_phone'], -9);
                    //     $variables['reference_url'] = Router::url(['controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'reporter' => true, 'full_base' => true]);
                    //     $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                    //     $this->QueuedTask->createJob('GenericSms', $datum);
                    // }

                    // //Notify managers
                    // $users = $this->Ce2b->User->find('all', array(
                    //     'contain' => array(),
                    //     'conditions' => array('User.group_id' => 2)
                    // ));
                    // foreach ($users as $user) {
                    //     $variables = array(
                    //         'name' => $user['User']['name'], 'reference_no' => $ce2b['Ce2b']['reference_no'],
                    //         'reference_link' => $html->link(
                    //             $ce2b['Ce2b']['reference_no'],
                    //             array('controller' => 'Ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'manager' => true, 'full_base' => true),
                    //             array('escape' => false)
                    //         ),
                    //         'modified' => $ce2b['Ce2b']['modified']
                    //     );
                    //     $datum = array(
                    //         'email' => $user['User']['email'],
                    //         'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_Ce2b_submit', 'model' => 'Ce2b',
                    //         'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    //         'message' => CakeText::insert($message['Message']['content'], $variables)
                    //     );

                    //     $this->QueuedTask->createJob('GenericEmail', $datum);
                    //     $this->QueuedTask->createJob('GenericNotification', $datum);
                    // }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The Ce2b has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Ce2b->id));
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The Ce2b has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The Ce2b could not be saved. Please review the error(s) and resubmit and try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Ce2b->read(null, $id);
        }

        //$Ce2b = $this->request->data;

        $counties = $this->Ce2b->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Ce2b->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Ce2b->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
    }

    public function reporter_view($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the Ce2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        } 
        $ce2b = $this->Ce2b->find('first', array(
            'conditions' => array('Ce2b.id' => $id),
            'contain' => array('Designation','Attachment','ExternalComment')
        ));
        
        $this->set('ce2b', $ce2b);

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'Ce2b' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('Ce2b_' . $ce2b['Ce2b']['id'] . '.pdf');
        }
    }

    public function reporter_delete($id = null)
    {
        # code...
        $this->common_delete($id);
    }

    public function common_delete($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid Ce2b'));
        }
        $ce2b = $this->Ce2b->read(null, $id);
        if ($ce2b['Ce2b']['submitted'] == 2) {
            $this->Session->setFlash(__('You cannot delete a submitted Ce2b Report'), 'alerts/flash_error');
            $this->redirect($this->referer());
        }
        //update the field deleted to true and deleted_date to current date without validation 
        $ce2b['Ce2b']['deleted'] = true;
        $ce2b['Ce2b']['deleted_date'] = date("Y-m-d H:i:s");
        if ($this->Ce2b->save($ce2b, array('validate' => false))) {
            //displat message with reference number 
            $this->Session->setFlash(__('Ce2b Report ' . $ce2b['Ce2b']['reference_no'] . ' has been deleted'), 'alerts/flash_info');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Ce2b was not deleted'), 'alerts/flash_error');
        $this->redirect($this->referer());
    }
}
