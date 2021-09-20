<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Transfusions Controller
 *
 * @property Transfusion $Transfusion
 * @property PaginatorComponent $Paginator
 */
class TransfusionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = true;

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Transfusion->recursive = 0;
		$this->set('transfusions', $this->Paginator->paginate());
	}*/
    public function reporter_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Transfusion->parseCriteria($this->passedArgs);
        $criteria['Transfusion.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Transfusion.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation', 'Pint');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Transfusion->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $designations = $this->Transfusion->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('transfusions', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function api_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);


        $criteria = $this->Transfusion->parseCriteria($this->passedArgs);
        $criteria['Transfusion.user_id'] = $this->Auth->User('id');        

        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Transfusion.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation', 'Pint');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Transfusion->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end csv export
        
        $this->set([
            'page_options', $page_options,
            'transfusions' => Sanitize::clean($this->paginate(), array('encode' => false)),
            'paging' => $this->request->params['paging'],
            '_serialize' => ['transfusions', 'page_options', 'paging']]);
    }

    public function partner_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Transfusion->parseCriteria($this->passedArgs);
        $criteria['Transfusion.user_id'] = $this->Auth->User('id');    
        $criteria['Transfusion.submitted'] = array(1, 2); 
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Transfusion.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation', 'Pint');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Transfusion->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $designations = $this->Transfusion->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('transfusions', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Transfusion->parseCriteria($this->passedArgs);
        // $criteria['Transfusion.submitted'] = 2;
        $criteria['Transfusion.copied !='] = '1';
        if (!isset($this->passedArgs['submit'])) $criteria['Transfusion.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Transfusion.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation', 'Pint');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Transfusion->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $designations = $this->Transfusion->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('transfusions', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($ctransfusions = ''){
        //todo: check if data exists in $users
        $this->response->download('TRANSFUSIONs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('ctransfusions'));
        $this->layout = false;
        $this->render('csv_export');
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

    public function reporter_view($id = null) {
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            $this->Session->setFlash(__('Could not verify the TRANSFUSION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Transfusion->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Transfusion->Luhn($this->Transfusion->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Transfusion->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $transfusion = $this->Transfusion->find('first', array(
                'conditions' => array('Transfusion.id' => $id),
                'contain' => array('Pint', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('transfusion', $transfusion);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }
    }

    public function api_view($id = null) {
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            $this->set([
                    'status' => 'failed',
                    'message' => 'Could not verify the TRANSFUSION report ID. Please ensure the ID is correct.',
                    '_serialize' => ['status', 'message']
                ]);
        } else {
            if (strpos($this->request->url, 'pdf') !== false) {
                $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
                // $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
            }

            $transfusion = $this->Transfusion->find('first', array(
                    'conditions' => array('Transfusion.id' => $id),
                    'contain' => array('Pint', 'County', 'Attachment', 'Designation', 'ExternalComment')
                ));
            
            $this->set([
                'status' => 'success', 
                'transfusion' => $transfusion, 
                '_serialize' => ['status', 'transfusion']]);
        }        
    }

    public function partner_view($id = null) {
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            $this->Session->setFlash(__('Could not verify the TRANSFUSION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Transfusion->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Transfusion->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Transfusion->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $transfusion = $this->Transfusion->find('first', array(
                'conditions' => array('Transfusion.id' => $id),
                'contain' => array('Pint', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('transfusion', $transfusion);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }
    }

    public function manager_view($id = null) {
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            $this->Session->setFlash(__('Could not verify the TRANSFUSION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }

        $transfusion = $this->Transfusion->find('first', array(
                'conditions' => array('Transfusion.id' => $id),
                'contain' => array('Pint', 'County', 'Attachment', 'Designation', 'ExternalComment', 
                    'TransfusionOriginal.Pint', 'TransfusionOriginal.County', 'TransfusionOriginal.Attachment', 'TransfusionOriginal.Designation', 'TransfusionOriginal.ExternalComment')
            ));
        $this->set('transfusion', $transfusion);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'TRANSFUSION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('TRANSFUSION_'.$transfusion['Transfusion']['id'].'.pdf');
        }
    }

/**
 * add method
 *
 * @return void
 */

    public function reporter_followup($id = null) {
        if ($this->request->is('post')) {
            $this->Transfusion->id = $id;
            if (!$this->Transfusion->exists()) {
                throw new NotFoundException(__('Invalid Transfusion Error'));
            }
            $transfusion = Hash::remove($this->Transfusion->find('first', array(
                        'contain' => array('Pint'),
                        'conditions' => array('Transfusion.id' => $id)
                        )
                    ), 'Transfusion.id');

            $transfusion = Hash::remove($transfusion, 'Pint.{n}.id');
            $data_save = $transfusion['Transfusion'];
            // $data_save['Pint'] = $transfusion['Pint'];
            if(isset($transfusion['Pint'])) $data_save['Pint'] = $transfusion['Pint'];
            $data_save['transfusion_id'] = $id;

            $count = $this->Transfusion->find('count',  array('conditions' => array(
                        'Transfusion.reference_no LIKE' => $transfusion['Transfusion']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $transfusion['Transfusion']['reference_no'];//.'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Transfusion->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Transfusion->id));               
            } else {
                $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

	public function reporter_add() {        
        $count = $this->Transfusion->find('count',  array('conditions' => array(
            'Transfusion.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $this->Transfusion->create();
        $this->Transfusion->save(['Transfusion' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'new',//'BT/'.date('Y').'/'.$count,
            'report_type' => 'Initial', 
            'designation_id' => $this->Auth->User('designation_id'), 
            'county_id' => $this->Auth->User('county_id'), 
            'institution_code' => $this->Auth->User('institution_code'), 
            'address' => $this->Auth->User('institution_address'),
            'reporter_name' => $this->Auth->User('name'),
            'reporter_email' => $this->Auth->User('email'),
            'reporter_phone' => $this->Auth->User('phone_no'),
            'contact' => $this->Auth->User('institution_contact'),
            'name_of_institution' => $this->Auth->User('name_of_institution')
            ]], false);
        $this->Session->setFlash(__('The Blood Transfusion Reaction has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Transfusion->id));
    }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

    public function reporter_edit($id = null) { 
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            throw new NotFoundException(__('Invalid TRANSFUSION'));
        }
        $transfusion = $this->Transfusion->read(null, $id);
        if ($transfusion['Transfusion']['submitted'] > 1) {
                $this->Session->setFlash(__('The blood transfusion incident has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Transfusion->id));
        }
        if ($transfusion['Transfusion']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this TRANSFUSION!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Transfusion->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Transfusion->saveField('submitted', 2);
                    //lucian
                    if(empty($transfusion->reference_no)) {
                        $count = $this->Transfusion->find('count',  array(
                            'fields' => 'Transfusion.reference_no',
                            'conditions' => array('Transfusion.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Transfusion.reference_no !=' => 'new'
                            )
                            ));
                        $count++;
                        $count = ($count < 10) ? "0$count" : $count; 
                        $this->Transfusion->saveField('reference_no', 'BT/'.date('Y').'/'.$count);
                    }
                    //bokelo
                    $transfusion = $this->Transfusion->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_transfusion_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $transfusion['Transfusion']['reference_no'],
                      'reference_link' => $html->link($transfusion['Transfusion']['reference_no'], array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $transfusion['Transfusion']['modified']
                      );
                    $datum = array(
                        'email' => $transfusion['Transfusion']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_transfusion_submit', 'model' => 'Transfusion',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Transfusion->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $transfusion['Transfusion']['reference_no'], 
                        'reference_link' => $html->link($transfusion['Transfusion']['reference_no'], array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $transfusion['Transfusion']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_transfusion_submit', 'model' => 'Transfusion',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The blood transfusion reaction report has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Transfusion->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The blood transfusion reaction report has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                //still attempt to save
                // $data = $this->request->data;
                // $this->Transfusion->saveAssociated($data, array('validate' => false, 'deep' => true));
                $this->Flash->error(__('The blood transfusion reaction could not be submitted to PPB. Please, correct the errors and try again.'));
            }
        } else {
            $this->request->data = $this->Transfusion->read(null, $id);
        }

        //$transfusion = $this->request->data;
        $counties = $this->Transfusion->County->find('list');
        $designations = $this->Transfusion->Designation->find('list');
        $this->set(compact('counties', 'designations'));
    }

    public function api_add($id = null) { 
        
        $this->Transfusion->create();

        $save_data = $this->request->data;
        $save_data['Transfusion']['user_id'] = $this->Auth->user('id');
        $save_data['Transfusion']['submitted'] = 2;
        //lucian
            $count = $this->Transfusion->find('count',  array(
                'fields' => 'Transfusion.reference_no',
                'conditions' => array('Transfusion.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Transfusion.reference_no !=' => 'new'
                )
                ));
            $count++;
            $count = ($count < 10) ? "0$count" : $count; 
        $save_data['Transfusion']['reference_no'] = 'BT/'.date('Y').'/'.$count;
        $save_data['Transfusion']['report_type'] = 'Initial';
        //bokelo

        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = 'first';  
            if ($this->Transfusion->saveAssociated($save_data, array('validate' => $validate, 'deep' => true))) {
                    
                    $transfusion = $this->Transfusion->read(null, $this->Transfusion->id);
                    $id = $this->Transfusion->id;

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_transfusion_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $transfusion['Transfusion']['reference_no'],
                      'reference_link' => $html->link($transfusion['Transfusion']['reference_no'], array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $transfusion['Transfusion']['modified']
                      );
                    $datum = array(
                        'email' => $transfusion['Transfusion']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_transfusion_submit', 'model' => 'Transfusion',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Transfusion->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $transfusion['Transfusion']['reference_no'], 
                        'reference_link' => $html->link($transfusion['Transfusion']['reference_no'], array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $transfusion['Transfusion']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_transfusion_submit', 'model' => 'Transfusion',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                    //**********************************    END   *********************************

                    $this->set([
                        'status' => 'success',
                        'message' => 'The TRANSFUSION has been submitted to PPB',
                        'transfusion' => $transfusion,
                        '_serialize' => ['status', 'message', 'transfusion']
                    ]); 
                
            } else {
                $this->set([
                        'status' => 'failed',
                        'message' => 'The TRANSFUSION could not be saved. Please review the error(s) and resubmit and try again.',
                        'validation' => $this->Transfusion->validationErrors,
                        'transfusion' => $this->request->data,
                        '_serialize' => ['status', 'message', 'validation', 'transfusion']
                    ]);            }
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function manager_copy($id = null) {
        if ($this->request->is('post')) {
            $this->Transfusion->id = $id;
            if (!$this->Transfusion->exists()) {
                throw new NotFoundException(__('Invalid TRANSFUSION'));
            }
            $transfusion = Hash::remove($this->Transfusion->find('first', array(
                        'contain' => array('Pint'),
                        'conditions' => array('Transfusion.id' => $id)
                        )
                    ), 'Transfusion.id');

            if($transfusion['Transfusion']['copied']) {
                $this->Session->setFlash(__('A clean copy already exists. Click on edit to update changes.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));   
            }
            $transfusion = Hash::remove($transfusion, 'Pint.{n}.id');
            $data_save = $transfusion['Transfusion'];
            $data_save['Pint'] = (!empty($transfusion['Pint'])) ? $transfusion['Pint'] : null;
            $data_save['transfusion_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Transfusion->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Transfusion->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Clean copy of '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Transfusion->id));               
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

	public function manager_edit($id = null) { 
        $this->Transfusion->id = $id;
        if (!$this->Transfusion->exists()) {
            throw new NotFoundException(__('Invalid TRANSFUSION'));
        }
        $transfusion = $this->Transfusion->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Transfusion->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Transfusion->saveField('submitted', 2);
                    $transfusion = $this->Transfusion->read(null, $id);

                    $this->Session->setFlash(__('The blood transfusion reaction report has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Transfusion->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The blood transfusion reaction report has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The blood transfusion reaction report could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Transfusion->read(null, $id);
        }

        //Manager will always edit a copied report
        $transfusion = $this->Transfusion->find('first', array(
                'conditions' => array('Transfusion.id' => $transfusion['Transfusion']['transfusion_id']),
                'contain' => array('Pint', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('transfusion', $transfusion);

        $counties = $this->Transfusion->County->find('list');
		$designations = $this->Transfusion->Designation->find('list');
		$this->set(compact('counties', 'designations'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Transfusion->exists($id)) {
			throw new NotFoundException(__('Invalid transfusion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transfusion->delete($id)) {
			$this->Flash->success(__('The transfusion has been deleted.'));
		} else {
			$this->Flash->error(__('The transfusion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
