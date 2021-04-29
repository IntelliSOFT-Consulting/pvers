<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');

/**
 * Aefis Controller
 *
 * @property Aefi $Aefi
 */
class AefisController extends AppController {
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
    public function reporter_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') $criteria['Aefi.submitted'] = array(2);  
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Aefi.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->paginate['contain'] = array('County', 'AefiListOfVaccine', 'AefiDescription', 'AefiListOfVaccine.Vaccine');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Aefi->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Aefi->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('aefis', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function partner_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        $criteria['Aefi.name_of_institution'] = $this->Auth->User('name_of_institution');    
        $criteria['Aefi.submitted'] = array(1, 2); 
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->paginate['contain'] = array('County', 'AefiListOfVaccine', 'AefiDescription', 'AefiListOfVaccine.Vaccine');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Aefi->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Aefi->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('aefis', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (!empty($this->request->query['pages'])) $this->paginate['limit'] = $this->request->query['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        // $criteria['Aefi.submitted'] = 2;
        $criteria['Aefi.copied !='] = '1';
        if (!isset($this->passedArgs['submit'])) $criteria['Aefi.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->paginate['contain'] = array('County', 'AefiListOfVaccine', 'AefiDescription', 'AefiListOfVaccine.Vaccine');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Aefi->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'], 'limit' => 1000)
              ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Aefi->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('aefis', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($caefis = ''){
        //todo: check if data exists in $users
        $this->response->download('AEFIs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('caefis'));
        $this->layout = false;
        $this->render('csv_export');
    }

    public function institutionCodes() {
        if($this->Auth->user('institution_code')) {
            $this->Aefi->recursive = -1;
            $this->paginate = array(
                'conditions' => array('Aefi.institution_code' => $this->Auth->user('institution_code')),
                'fields' => array('Aefi.report_title', 'Aefi.created'),
                'limit' => 25,
                'order' => array(
                    'Aefi.created' => 'asc'
                )
            );
            $this->set('aefis', $this->paginate());
        }
    }
/**
 * view methods
 */
    public function reporter_view($id = null) {
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            // $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Aefi->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Aefi->Luhn($this->Aefi->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Aefi->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        // $aefi = $this->Aefi->read(null);
        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $id),
                'contain' => array('AefiListOfVaccine', 'AefiListOfVaccine.Vaccine', 'AefiDescription', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment', 
                'AefiOriginal', 'AefiOriginal.AefiListOfVaccine', 'AefiOriginal.AefiDescription', 'AefiOriginal.AefiListOfVaccine.Vaccine', 'AefiOriginal.County', 'AefiOriginal.SubCounty', 'AefiOriginal.Attachment', 'AefiOriginal.Designation', 'AefiOriginal.ExternalComment')
            ));
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
    }

    public function partner_view($id = null) {
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            // $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Aefi->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Aefi->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Aefi->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        // $aefi = $this->Aefi->read(null);
        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $id),
                'contain' => array('AefiListOfVaccine', 'AefiListOfVaccine.Vaccine', 'AefiDescription', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment', 
                'AefiOriginal', 'AefiOriginal.AefiListOfVaccine', 'AefiOriginal.AefiDescription', 'AefiOriginal.AefiListOfVaccine.Vaccine', 'AefiOriginal.County', 'AefiOriginal.SubCounty', 'AefiOriginal.Attachment', 'AefiOriginal.Designation', 'AefiOriginal.ExternalComment')
            ));
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
    }

    public function manager_view($id = null) {
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }

        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $id),
                'contain' => array('AefiListOfVaccine', 'AefiListOfVaccine.Vaccine', 'AefiDescription', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment', 
                'AefiOriginal', 'AefiOriginal.AefiListOfVaccine', 'AefiOriginal.AefiDescription', 'AefiOriginal.AefiListOfVaccine.Vaccine', 'AefiOriginal.County', 'AefiOriginal.SubCounty', 'AefiOriginal.Attachment', 'AefiOriginal.Designation', 'AefiOriginal.ExternalComment')
            ));
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
    }

/**
 * download methods
 */
    public function download($id = null) {
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the AEFI report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $id),
                'contain' => array('AefiListOfVaccine', 'AefiDescription', 'Attachment', 'Designation')
            ));
        $aefi = Sanitize::clean($aefi, array('escape' => true));
        $this->set('aefi', $aefi);
        $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.xml');
    }

    public function vigiflow($id = null) {
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the AEFI report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $id),
                'contain' => array('AefiListOfVaccine', 'AefiDescription', 'County', 'Attachment', 'Designation')
            ));
        $aefi = Sanitize::clean($aefi, array('escape' => true));

        $view = new View($this,false);
        $view->viewPath='Aefis/xml';  // Directory inside view directory to search for .ctp files
        $view->layout=false; // if you want to disable layout
        $view->set('aefi', $aefi); // set your variables for view here
        $html=$view->render('download'); 

        // debug($html);
        $HttpSocket = new HttpSocket();
        // string data
        $results = $HttpSocket->post(
            //'https://api.who-umc.org/vigiflow/icsrs',
            'https://api.who-umc.org/demo/vigiflow/icsrs',
            $html,
            array('header' => array('umc-client-key' => '5ab835c4-3179-4590-bcd2-ff3c27d6b8ff'))
        );

        // debug($results->code);
        // debug($results->body);
        if ($results->isOk()) {
            $body = $results->body;
            $this->Aefi->saveField('vigiflow_message', $body);
            $this->Aefi->saveField('vigiflow_date', date('Y-m-d H:i:s'));
            $resp = json_decode($body, true);
            if(json_last_error() == JSON_ERROR_NONE) {
                $this->Aefi->saveField('vigiflow_ref', $resp['MessageId']);
            }
            $this->Flash->success('Vigiflow integration success!!');
            $this->Flash->success($body);
            $this->redirect($this->referer());
        } else {
            $body = $results->body;
            $this->Aefi->saveField('vigiflow_message', $body);
            $this->Flash->error('Error sending report to vigiflow:');
            $this->Flash->error($body);
            $this->redirect($this->referer());
        }
        $this->autoRender = false ;
    }
/**
 * add method
 *
 * @return void
 */

    public function reporter_add() {        
        // $count = $this->Aefi->find('count',  array('conditions' => array(
        //     'Aefi.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        // $count++;
        // $count = ($count < 10) ? "0$count" : $count;
        $this->Aefi->create();
        $this->Aefi->save(['Aefi' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'new',//'AEFI/'.date('Y').'/'.$count,
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
        $this->Session->setFlash(__('The AEFI has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Aefi->id));
    }

    public function reporter_followup($id = null) {
        if ($this->request->is('post')) {
            $this->Aefi->id = $id;
            if (!$this->Aefi->exists()) {
                throw new NotFoundException(__('Invalid AEFI'));
            }
            $aefi = Hash::remove($this->Aefi->find('first', array(
                        'contain' => array('AefiListOfVaccine', 'AefiDescription'),
                        'conditions' => array('Aefi.id' => $id)
                        )
                    ), 'Aefi.id');

            $aefi = Hash::remove($aefi, 'AefiListOfVaccine.{n}.id');
            $data_save = $aefi['Aefi'];
            $data_save['AefiListOfVaccine'] = $aefi['AefiListOfVaccine'];
            $data_save['aefi_id'] = $id;

            $count = $this->Aefi->find('count',  array('conditions' => array(
                        'Aefi.reference_no LIKE' => $aefi['Aefi']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $aefi['Aefi']['reference_no'].'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Aefi->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Aefi->id));               
            } else {
                $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */

    public function reporter_edit($id = null) { 
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            throw new NotFoundException(__('Invalid AEFI'));
        }
        $aefi = $this->Aefi->read(null, $id);
        if ($aefi['Aefi']['submitted'] > 1) {
                $this->Session->setFlash(__('The AEFI has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Aefi->id));
        }
        if ($aefi['Aefi']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this AEFI!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Aefi->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Aefi->saveField('submitted', 2);
                    //lucian
                    $count = $this->Aefi->find('count',  array(
                        'fields' => 'Aefi.reference_no',
                        'conditions' => array('Aefi.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Aefi.reference_no !=' => 'new'
                        )
                        ));
                    $count++;
                    $count = ($count < 10) ? "0$count" : $count; 
                    $this->Aefi->saveField('reference_no', 'AEFI/'.date('Y').'/'.$count);
                    //bokelo
                    $aefi = $this->Aefi->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_aefi_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $aefi['Aefi']['reference_no'],
                      'reference_link' => $html->link($aefi['Aefi']['reference_no'], array('controller' => 'aefis', 'action' => 'view', $aefi['Aefi']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $aefi['Aefi']['modified']
                      );
                    $datum = array(
                        'email' => $aefi['Aefi']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_aefi_submit', 'model' => 'Aefi',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Aefi->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $aefi['Aefi']['reference_no'], 
                        'reference_link' => $html->link($aefi['Aefi']['reference_no'], array('controller' => 'aefis', 'action' => 'view', $aefi['Aefi']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $aefi['Aefi']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_aefi_submit', 'model' => 'Aefi',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                      // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The AEFI has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Aefi->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The AEFI has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The AEFI could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Aefi->read(null, $id);
        }

        //$aefi = $this->request->data;

        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Aefi->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Aefi->Designation->find('list');
        $this->set(compact('designations'));        
        $vaccines = $this->Aefi->AefiListOfVaccine->Vaccine->find('list');
        $this->set(compact('vaccines'));
    }

    public function manager_copy($id = null) {
        if ($this->request->is('post')) {
            $this->Aefi->id = $id;
            if (!$this->Aefi->exists()) {
                throw new NotFoundException(__('Invalid AEFI'));
            }
            $aefi = Hash::remove($this->Aefi->find('first', array(
                        'contain' => array('AefiListOfVaccine'),
                        'conditions' => array('Aefi.id' => $id)
                        )
                    ), 'Aefi.id');

            $aefi = Hash::remove($aefi, 'AefiListOfVaccine.{n}.id');
            $data_save = $aefi['Aefi'];
            $data_save['AefiListOfVaccine'] = $aefi['AefiListOfVaccine'];
            $data_save['aefi_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Aefi->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Aefi->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Clean copy of '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Aefi->id));               
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

    public function manager_edit($id = null) { 
        $this->Aefi->id = $id;
        if (!$this->Aefi->exists()) {
            throw new NotFoundException(__('Invalid AEFI'));
        }
        $aefi = $this->Aefi->read(null, $id);
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Aefi->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Aefi->saveField('submitted', 2);
                    $aefi = $this->Aefi->read(null, $id);

                    $this->Session->setFlash(__('The AEFI has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Aefi->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The AEFI has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The AEFI could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Aefi->read(null, $id);
        }

        //Manager will always edit a copied report
        $aefi = $this->Aefi->find('first', array(
                'conditions' => array('Aefi.id' => $aefi['Aefi']['aefi_id']),
                'contain' => array('AefiListOfVaccine', 'AefiDescription', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('aefi', $aefi);

        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Aefi->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Aefi->Designation->find('list');
        $this->set(compact('designations'));
        $vaccines = $this->Aefi->AefiListOfVaccine->Vaccine->find('list');
        $this->set(compact('vaccines'));
    }


}
