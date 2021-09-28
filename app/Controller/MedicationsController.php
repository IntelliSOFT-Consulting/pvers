<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Medications Controller
 *
 * @property Medication $Medication
 * @property PaginatorComponent $Paginator
 */
class MedicationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Search.Prg');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

/**
 * index method
 *
 * @return void
 */
    public function reporter_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Medication->parseCriteria($this->passedArgs);        
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Medication.user_id'] = $this->Auth->User('id');        
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') $criteria['Medication.submitted'] = array(2);  
        // $criteria['Medication.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Medication.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Medication->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $counties = $this->Medication->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Medication->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('medications', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function api_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        
        $page_options = array('5' => '5', '10' => '10', '25' => '25');
        (!empty($this->request->query('pages'))) ? $this->paginate['limit'] = $this->request->query('pages') :  $this->paginate['limit'] = reset($page_options);


        $criteria = $this->Medication->parseCriteria($this->passedArgs);
        $criteria['Medication.user_id'] = $this->Auth->User('id');        

        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Medication.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Medication->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end csv export
        
        $this->set([
            'page_options', $page_options,
            'medications' => Sanitize::clean($this->paginate(), array('encode' => false)),
            'paging' => $this->request->params['paging'],
            '_serialize' => ['medications', 'page_options', 'paging']]);
    }

    public function partner_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Medication->parseCriteria($this->passedArgs);
        $criteria['Medication.name_of_institution'] = $this->Auth->User('name_of_institution');    
        $criteria['Medication.submitted'] = array(1, 2); 
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Medication.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Medication->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $counties = $this->Medication->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Medication->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('medications', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Medication->parseCriteria($this->passedArgs);
        // $criteria['Medication.submitted'] = 2;
        $criteria['Medication.copied !='] = '1';
        if (!isset($this->passedArgs['submit'])) $criteria['Medication.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Medication.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Medication->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $counties = $this->Medication->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Medication->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('medications', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($cmedications = ''){
        //todo: check if data exists in $users
        $this->response->download('MEDICATIONs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('cmedications'));
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
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the MEDICATION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Medication->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Medication->Luhn($this->Medication->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Medication->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $id),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('medication', $medication);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }
    }

    public function api_view($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->set([
                    'status' => 'failed',
                    'message' => 'Could not verify the MEDICATION report ID. Please ensure the ID is correct.',
                    '_serialize' => ['status', 'message']
                ]);
        } else {
            if (strpos($this->request->url, 'pdf') !== false) {
                $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
                // $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
            }

            $medication = $this->Medication->find('first', array(
                    'conditions' => array('Medication.id' => $id),
                    'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation', 'ExternalComment')
                ));
            
            $this->set([
                'status' => 'success', 
                'medication' => $medication, 
                '_serialize' => ['status', 'medication']]);
        }        
    }

    public function partner_view($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the MEDICATION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Medication->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Medication->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Medication->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $id),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('medication', $medication);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }
    }

    public function manager_view($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the MEDICATION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }

        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $id),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation', 'ExternalComment',
                   'MedicationOriginal.MedicationProduct', 'MedicationOriginal.County', 'MedicationOriginal.Attachment', 'MedicationOriginal.Designation', 'MedicationOriginal.ExternalComment' )
            ));
        $this->set('medication', $medication);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }
    }


/**
 * download methods
 */
    public function download($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $id),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation')
            ));
        $medication = Sanitize::clean($medication, array('escape' => true));
        $this->set('medication', $medication);
        $this->response->download('MEDICATION_'.$medication['Medication']['id']);
    }

    public function vigiflow($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $id),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation')
            ));
        $medication = Sanitize::clean($medication, array('escape' => true));

        $view = new View($this,false);
        $view->viewPath='Medications/xml';  // Directory inside view directory to search for .ctp files
        $view->layout=false; // if you want to disable layout
        $view->set('medication', $medication); // set your variables for view here
        $html=$view->render('download'); 

        // debug($html);
        $HttpSocket = new HttpSocket();
        // string data
        $results = $HttpSocket->post(
            Configure::read('vigiflow_api'),
            $html,
            array('header' => array('umc-client-key' => Configure::read('vigiflow_key')))
        );

        // debug($results->code);
        // debug($results->body);
        if ($results->isOk()) {
            $body = $results->body;
            $this->Medication->saveField('vigiflow_message', $body);
            $resp = json_decode($body, true);
            if(json_last_error() == JSON_ERROR_NONE) {
                $this->Medication->saveField('vigiflow_ref', $resp['MessageId']);
            }
            $this->Flash->success('Vigiflow integration success!!');
            $this->Flash->success($body);
            $this->redirect($this->referer());
        } else {
            $body = $results->body;
            $this->Medication->saveField('vigiflow_message', $body);
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

    public function reporter_followup($id = null) {
        if ($this->request->is('post')) {
            $this->Medication->id = $id;
            if (!$this->Medication->exists()) {
                throw new NotFoundException(__('Invalid Medication Error'));
            }
            $medication = Hash::remove($this->Medication->find('first', array(
                        'contain' => array('MedicationProduct'),
                        'conditions' => array('Medication.id' => $id)
                        )
                    ), 'Medication.id');

            $medication = Hash::remove($medication, 'MedicationProduct.{n}.id');
            $data_save = $medication['Medication'];
            $data_save['MedicationProduct'] = $medication['MedicationProduct'];
            $data_save['medication_id'] = $id;

            $count = $this->Medication->find('count',  array('conditions' => array(
                        'Medication.reference_no LIKE' => $medication['Medication']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $medication['Medication']['reference_no'];//.'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Medication->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Medication->id));               
            } else {
                $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

	public function reporter_add() {        
        // $count = $this->Medication->find('count',  array('conditions' => array(
        //     'Medication.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        // $count++;
        // $count = ($count < 10) ? "0$count" : $count;
        $this->Medication->create();
        $this->Medication->save(['Medication' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'new',//'ME/'.date('Y').'/'.$count,
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
        $this->Session->setFlash(__('The MEDICATION has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Medication->id));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

    public function reporter_edit($id = null) { 
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            throw new NotFoundException(__('Invalid MEDICATION'));
        }
        $medication = $this->Medication->read(null, $id);
        if ($medication['Medication']['submitted'] > 1) {
                $this->Session->setFlash(__('The medication has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Medication->id));
        }
        if ($medication['Medication']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this MEDICATION!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Medication->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Medication->saveField('submitted', 2);
                    //lucian
                    if(empty($medication->reference_no)) {
                        $count = $this->Medication->find('count',  array(
                            'fields' => 'Medication.reference_no',
                            'conditions' => array('Medication.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Medication.reference_no !=' => 'new'
                            )
                            ));
                        $count++;
                        $count = ($count < 10) ? "0$count" : $count; 
                        $this->Medication->saveField('reference_no', 'ME/'.date('Y').'/'.$count);
                    }
                    //bokelo
                    $medication = $this->Medication->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_medication_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $medication['Medication']['reference_no'],
                      'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $medication['Medication']['modified']
                      );
                    $datum = array(
                        'email' => $medication['Medication']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_medication_submit', 'model' => 'Medication',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Medication->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $medication['Medication']['reference_no'], 
                        'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $medication['Medication']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_medication_submit', 'model' => 'Medication',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                      // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The Medication Error Report has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Medication->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The MEDICATION has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The MEDICATION could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Medication->read(null, $id);
        }

        //$medication = $this->request->data;

        $counties = $this->Medication->County->find('list');
        $designations = $this->Medication->Designation->find('list');
        $this->set(compact('counties', 'designations'));
    }

    public function api_add($id = null) {
        
        $this->Medication->create();
        $this->_attachments('Medication');

        $save_data = $this->request->data;
        $save_data['Medication']['user_id'] = $this->Auth->user('id');
        $save_data['Medication']['submitted'] = 2;
        //lucian
            $count = $this->Medication->find('count',  array(
                'fields' => 'Medication.reference_no',
                'conditions' => array('Medication.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Medication.reference_no !=' => 'new'
                )
                ));
            $count++;
            $count = ($count < 10) ? "0$count" : $count; 
        $save_data['Medication']['reference_no'] = 'ME/'.date('Y').'/'.$count;
        $save_data['Medication']['report_type'] = 'Initial';
        //bokelo

        if ($this->request->is('post') || $this->request->is('put')) {
            
            $validate = 'first';                

            if ($this->Medication->saveAssociated($save_data, array('validate' => $validate, 'deep' => true))) {

                    $medication = $this->Medication->read(null, $this->Medication->id);
                    $id = $this->Medication->id;

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_medication_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $medication['Medication']['reference_no'],
                      'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $medication['Medication']['modified']
                      );
                    $datum = array(
                        'email' => $medication['Medication']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_medication_submit', 'model' => 'Medication',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Medication->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $medication['Medication']['reference_no'], 
                        'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $medication['Medication']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_medication_submit', 'model' => 'Medication',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                      // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                    }
                    //**********************************    END   *********************************

                    $this->set([
                        'status' => 'success',
                        'message' => 'The MEDICATION has been submitted to PPB',
                        'medication' => $medication,
                        '_serialize' => ['status', 'message', 'medication']
                    ]);  

            } else {
                $this->set([
                        'status' => 'failed',
                        'message' => 'The MEDICATION could not be saved. Please review the error(s) and resubmit and try again.',
                        'validation' => $this->Medication->validationErrors,
                        'medication' => $this->request->data,
                        '_serialize' => ['status', 'message', 'validation', 'medication']
                    ]);
            }
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function manager_copy($id = null) {
        if ($this->request->is('post')) {
            $this->Medication->id = $id;
            if (!$this->Medication->exists()) {
                throw new NotFoundException(__('Invalid MEDICATION'));
            }
            $medication = Hash::remove($this->Medication->find('first', array(
                        'contain' => array('MedicationProduct'),
                        'conditions' => array('Medication.id' => $id)
                        )
                    ), 'Medication.id');

            if($medication['Medication']['copied']) {
                $this->Session->setFlash(__('A clean copy already exists. Click on edit to update changes.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));   
            }
            $medication = Hash::remove($medication, 'MedicationProduct.{n}.id');
            $data_save = $medication['Medication'];
            $data_save['MedicationProduct'] = $medication['MedicationProduct'];
            $data_save['medication_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Medication->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Medication->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Clean copy of '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Medication->id));               
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

	public function manager_edit($id = null) { 
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            throw new NotFoundException(__('Invalid MEDICATION'));
        }
        $medication = $this->Medication->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Medication->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Medication->saveField('submitted', 2);
                    $medication = $this->Medication->read(null, $id);

                    $this->Session->setFlash(__('The Medication Error Report has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Medication->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The MEDICATION has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The MEDICATION could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Medication->read(null, $id);
        }

        //Manager will always edit a copied report
        $medication = $this->Medication->find('first', array(
                'conditions' => array('Medication.id' => $medication['Medication']['medication_id']),
                'contain' => array('MedicationProduct', 'County', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('medication', $medication);

   		$counties = $this->Medication->County->find('list');
		$designations = $this->Medication->Designation->find('list');
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
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medication->delete($id)) {
			$this->Flash->success(__('The medication has been deleted.'));
		} else {
			$this->Flash->error(__('The medication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
