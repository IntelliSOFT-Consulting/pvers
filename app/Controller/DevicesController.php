<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Devices Controller
 *
 * @property Device $Device
 */
class DevicesController extends AppController {
    public $components = array('Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = array();

    public $uses = array('Device', 'Attachment');

    /*public function beforeFilter() {
        parent::beforeFilter();
        // add auth effectively to views
        $this->Auth->allow('index', 'add', 'edit','view', 'find', 'download');
        $this->Security->blackHoleCallback = 'blackhole';
        if ($this->RequestHandler->isXml() || $this->RequestHandler->isAjax() || $this->request->params['action'] == 'edit')  $this->Security->csrfCheck = false;
    }

    public function blackhole($type) {
        $this->Session->setFlash(__('Sorry! The page has expired due to a '.$type.' error. Please refresh the page.'), 'flash_error');
        $this->redirect($this->referer());
    }*/

    public function vigiflowlink($id = null) {
        $this->Device->id = $this->Device->Luhn_Verify($this->request->data['Device']['id']);
        if ($this->Device->exists()) {
            $this->set('message', 'The report '.$id.' does not exist');
            $this->set('_serialize', 'message');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Device->saveField('vigiflow_id', $this->request->data['Device']['vigiflow_id'])) {
                $this->set('message', $this->request->data['Device']['vigiflow_id']);
                $this->set('_serialize', 'message');
            } else {
                $this->set('message', 'Could not save '.$this->request->data['Device']['vigiflow_id']);
                $this->set('_serialize', 'message');
            }
        }
    }
/**
 * index method
 */
    /*public function index() {
        $this->Device->recursive = 0;
        $this->set('devices', $this->paginate());
    }*/
    public function reporter_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $criteria['Device.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Device->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $this->set('devices', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function deviceIndex() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        if (isset($this->passedArgs['id']) && $this->Device->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Device->Luhn_Verify($this->passedArgs['id']);
        $criteria = $this->Device->parseCriteria($this->passedArgs);
        if($this->Auth->User('group_id') != 4) $criteria['Device.user_id'] = $this->Auth->user('id');
        else $criteria['Device.institution_code'] = $this->Auth->user('ward');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->Device->recursive = -1;

        if (strpos($this->request->url,'xls') !== false){
            $this->helpers[] = 'PhpExcel';
            $this->Device->recursive = 1;
        }
        if ($this->RequestHandler->isXml()) {
            $this->Device->recursive = 1;
            $this->response->download('DEVICES_'.date('Y_m_d_His'));
        }
        $this->set('devices', $this->paginate());
    }

    public function admin_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        if (isset($this->passedArgs['id']) && $this->Device->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Device->Luhn_Verify($this->passedArgs['id']);
        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->Device->recursive = -1;

        if (strpos($this->request->url,'xls') !== false){
            $this->helpers[] = 'PhpExcel';
            $this->Device->recursive = 1;
            $routes = $this->Device->DeviceListOfDrug->Route->find('list');
            $this->set(compact('routes'));
            $frequency = $this->Device->DeviceListOfDrug->Frequency->find('list');
            $this->set(compact('frequency'));
            $dose = $this->Device->DeviceListOfDrug->Dose->find('list');
            $this->set(compact('dose'));
        }
        if ($this->RequestHandler->isXml()) {
            $this->Device->recursive = 1;
            $this->response->download('DEVICES_'.date('Y_m_d_His'));
        }
        $this->set('devices', $this->paginate());
    }

    private function csv_export($cdevices = ''){
        //todo: check if data exists in $users
        $_serialize = 'cdevices';
        $_header = array('Id', 'Reference Number', 
            'Created',
            );
        $_extract = array('Device.id', 'Device.reference_no', 
            'Device.created');

        $this->response->download('DEVICES_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->viewClass = 'CsvView.Csv';
        $this->set(compact('cdevices', '_serialize', '_header', '_extract'));
    }
    
    public function institutionCodes() {
        if($this->Auth->user('institution_code')) {
            $this->Device->recursive = -1;
            $this->paginate = array(
                'conditions' => array('Device.institution_code' => $this->Auth->user('institution_code')),
                'fields' => array('Device.report_title', 'Device.created'),
                'limit' => 25,
                'order' => array(
                    'Device.created' => 'asc'
                )
            );
            $this->set('devices', $this->paginate());
        }
    }
/**
 * view methods
 */
    public function view($id = null) {
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Device->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Device->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }
        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $device = $this->Device->read(null);
        $this->set('device', $device);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }
    }

    public function reporter_view($id = null) {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the DEVICE report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Device->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Device->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $device = $this->Device->read(null);
        $this->set('device', $device);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }
    }

    public function admin_view($id = null) {
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $device = $this->Device->read(null);
        $this->set('device', $device);
        // $this->render('pdf/view');
        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }
        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id,  'orientation' => 'portrait');
            $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
            $this->render('view');
        }
        if ($this->RequestHandler->isXml()) {
            $this->response->download('DEVICE_'.date('Y_m_d_His'));
        }
    }

    public function admin_reply($id = null) {
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $this->set('device', $this->Device->read(null));
        $this->Device->saveField('submitted', 1);
    }

    public function find() {
        $this->Device->id = $this->Device->Luhn_Verify($this->request->data['Device']['search']);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        } else {
            $this->redirect(array('action' => 'view', $this->request->data['Device']['search']));
        }

    }

/**
 * download methods
 */
    public function download($id = null) {
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        }
        $device = $this->Device->read(null);
        $device = Sanitize::clean($device, array('escape' => true));
        $this->set('device', $device);
        //if(!$device['Device']['vigiflow_id']) {
            if ($this->RequestHandler->isXml()) {
                $this->Device->saveField('submitted', 3);
            }
            $this->response->download('DEVICE_'.$device['Device']['id']);
        //} else {
        //  $this->Session->setFlash(__('The report could not be exported to E2B. It is already linked with a vigiflow ID'), 'flash_error');
        //  $this->redirect($this->referer());
        //}
    }

/**
 * add method
 *
 * @return void
 */
    public function add($report = null) {
        $this->set('title_for_layout', 'New DEVICE');
        $response = array();
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Device->create();
            if (strpos($this->request->url,'xml') !== false) {
                //XML REQUEST
                // pr($this->request->data);
                $this->Device->set($this->request->data);
                unset($this->Device->validate['form_id']);
                $this->beforeSaving();
                if ($this->Device->saveAssociated($this->request->data)) {
                    $response['message'] = 'Thank you for submitting the report. A copy of the device report has been sent to the email address you provided';
                    $response['id'] = $this->Device->Luhn($this->Device->id);
                    $this->set('message', $response);
                } else {
                    $response['message'] = 'Sorry. We could not save your report. Please review the validation errors and resubmit.';
                    $this->set('message', $response);
                }
                //XML REQUEST
            } else {
                $this->Device->set($this->request->data);
                if($this->Auth->user('id')) {
                    $this->request->data['Device']['user_id'] = $this->Auth->user('id');
                }

                if ($this->request->data['Device']['report_type'] == 'Follow-up Report') {
                    #Check if report exists and owner
                    $device = Hash::remove($this->Device->find('first', array(
                                'contain' => array('DeviceListOfVaccine', 'Attachment'),
                                'conditions' => array('Device.id' => $this->Device->Luhn_Verify($this->data['Device']['form_id']))
                                )
                            ), 'Device.id');
                    if (empty($device['Device'])) {
                        $this->Session->setFlash(__('Invalid DEVICE id'), 'flash_warning');
                        $this->redirect(array('controller' => 'devices', 'action' => 'add'));
                    } elseif ($device['Device']['submitted'] == 0) {
                        $this->Session->setFlash(__('Initial DEVICE has not yet been submitted to PPB. Please submit first.'), 'flash_info');
                        $this->redirect(array('controller' => 'devices', 'action' => 'edit', $this->data['Device']['form_id']));
                    }
                    $device = Hash::remove($device, 'DeviceListOfVaccine.{n}.id');
                    $device = Hash::remove($device, 'Attachment.{n}.id');
                    $device['Device']['submitted'] = 0;
                    $data_save = $device['Device'];
                    $data_save['DeviceListOfVaccine'] = $device['DeviceListOfVaccine'];
                    if(isset($device['Attachment'])) $data_save['Attachment'] = $device['Attachment'];
                    $data_save['device_id'] = $this->Device->Luhn_Verify($this->data['Device']['form_id']);

                    // $count = $this->Device->find('count',  array('conditions' => array(
                    //             'Device.reference_no LIKE' => $device['Device']['reference_no'].'%',
                    //             )));
                    // $count = ($count < 10) ? "0$count" : $count;
                    $data_save['reference_no'] = $this->data['Device']['form_id'];
                    $data_save['report_type'] = 'Follow-up Report';
                    // $data_save['approved'] = 0;

                    if ($this->Device->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                            $this->Session->setFlash(__('Follow up '.$this->Device->Luhn($this->Device->id).' has been created'), 'flash_success');
                            $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));            
                    } else {
                        $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                        $this->redirect($this->referer());
                    }
                } elseif ($this->request->data['Device']['report_type'] == 'Initial Report' && $this->Device->validates(array('fieldList' => array('device', 'report_type', 'reporter_email'))) && empty($this->data['Device']['bot_stop'])) {
                    $device = 0;
                    $fieldlist = array('device', 'report_type', 'reporter_email');
                    if($this->RequestHandler->isMobile()) {
                        $device = 2; // Mobile web devices
                        $this->request->data['Device']['device'] = 2; // Mobile web devices
                    }

                    if($this->Auth->user('id')) {
                        $this->createDevice();
                        $fieldlist = array('device', 'report_type', 'reporter_email', 'user_id', 'county_id', 'designation_id', 'reporter_name', 'reporter_email',
                                        'name_of_institution', 'address', 'institution_code', 'contact', 'reporter_phone');
                    }
                                            unset($this->Device->validate['county_id']);
                    if($this->Device->save($this->request->data, array('fieldList' => $fieldlist))) {
                        $this->Session->setFlash(__('Form for reporting adverse event following immunization. Note the form ID. An email has been sent to the address you provided containing the report ID.'), 'flash_success');
                        $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
                    } else {
                        $this->Session->setFlash(__('Hmm! Seems something went wrong!'), 'flash_error');
                    }
                } else {
                    $response['message'] = 'Could not create DEVICE form. Please ensure the data is correct.';
                    $this->Session->setFlash(__($response['message']), 'flash_error');
                }
            }
        }
    }

    public function reporter_add() {        
        $count = $this->Device->find('count',  array('conditions' => array(
            'Device.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $this->Device->create();
        $this->Device->save(['Device' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'MD/'.date('Y').'/'.$count,
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
        $this->Session->setFlash(__('The Medical Device Incident has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Device->id));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->set('title_for_layout', 'Edit Device '.$id);
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            // throw new NotFoundException(__('Invalid device'));
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        } else {
            $device = $this->Device->read(null);
            if ($device['Device']['submitted'] > 1) {
                $this->Session->setFlash(__('The Report has been sent to PPB. You don\'t have permissions to edit it further.'), 'flash_error');
                $this->redirect(array('action' => 'view', $id));
            }
        }
        // pr($this->Device);
        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data)) {
                if (isset($this->request->data['cancelReport'])) {
                    $this->Session->setFlash(__('You have canceled a report'), 'flash_success');
                    $this->redirect('/');
                }
                $this->beforeSaving();
                $validate = false;
                if (isset($this->request->data['submitReport'])) {  $validate = 'first';    }
                //Set Logged in user
                if($this->Auth->user('id')) {
                    $this->request->data['Device']['user_id'] = $this->Auth->user('id');
                }
                if(isset($this->request->data['Attachment']) && !empty($this->request->data['Attachment'])) {
                    foreach($this->request->data['Attachment'] as $attachment) {
                        $dataToSave[]['Attachment'] = $attachment;
                    }
                }
                if (isset($dataToSave) && !$this->Attachment->saveAll($dataToSave, array('validate' => 'only'))) {
                    $this->beforeDisplaying();
                    $this->Session->setFlash(__('The attachments you provided are invalid. Please review the error and resubmit.'), 'flash_error');
                } else {
                    if ($this->Device->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                        if (!$this->request->is('ajax')) {
                            if($validate == 'first') {
                                $this->Device->saveField('submitted', 2);
                                $this->Session->setFlash(__('Thank you for submitting the report.
                                A copy of the device report has been sent to the email address you provided'), 'flash_success');
                                $this->redirect(array('action' => 'view', $this->Device->Luhn($this->Device->id)));
                            } else {
                                $this->Session->setFlash(__('The device has been saved'), 'flash_success');
                                $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
                            }
                        } else {
                            $this->set('message', 'phwesk!! finally some progress'.$id);
                            $this->set('_serialize', 'message');
                        }
                    } else {
                        $this->beforeDisplaying();
                        // pr($this->request->data);
                        // pr($this->validationErrors);
                        $this->Session->setFlash(__('The report could not be saved. Please, review the fields marked in red.'), 'flash_error');
                    }
                }
            } else {
                $this->Session->setFlash(__('The Report could not be saved. Please ensure the file size is less than 5MB'), 'flash_error');
                $this->redirect(array('action' => 'edit', $id));
            }
        } else {
            $this->request->data = $device;
        }

        // $this->set('attachments', $this->Device->Attachment->find('all', array('conditions'=> array('Attachment.device_id' => $device['Device']['id']))));
        // $this->set('attachments', $device['Attachment']);
        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Device->Designation->find('list');
        $this->set(compact('designations'));
    }

    public function reporter_edit($id = null) { 
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid DEVICE'));
        }
        $device = $this->Device->read(null, $id);
        if ($device['Device']['submitted'] > 1) {
                $this->Session->setFlash(__('The sae has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Device->id));
        }
        if ($device['Device']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this DEVICE!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Device->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Device->saveField('submitted', 2);
                    $device = $this->Device->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_device_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $device['Device']['reference_no'],
                      'reference_link' => $html->link($device['Device']['reference_no'], array('controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $device['Device']['modified']
                      );
                    $datum = array(
                        'email' => $device['Device']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_device_submit', 'model' => 'Device',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Device->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $device['Device']['reference_no'], 
                        'reference_link' => $html->link($device['Device']['reference_no'], array('controller' => 'saes', 'action' => 'view', $device['Device']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $device['Device']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_device_submit', 'model' => 'Device',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                      // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The DEVICE has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Device->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The DEVICE has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The DEVICE could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Device->read(null, $id);
        }

        //$device = $this->request->data;
        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Device->Designation->find('list');
        $this->set(compact('designations'));
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Edit Device '.$id);
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            // throw new NotFoundException(__('Invalid device'));
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        } else {
            $device = $this->Device->read(null);
        }
        // pr($this->Device);
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['deleteReport'])) {
                $this->Session->setFlash(__('You have Deleted a report'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            }
            $this->beforeSaving();
            $validate = 'first';
            //Set Logged in user
            if($this->Auth->user('id')) {
                $this->request->data['Device']['user_id'] = $this->Auth->user('id');
            }
            // pr($this->data);
            if ($this->Device->saveAssociated($this->request->data, array('validate' => $validate))) {
                if (!$this->request->is('ajax')) {
                    $this->Session->setFlash(__('You have successfully saved the report'), 'flash_success');
                    $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
                } else {
                    $this->set('message', 'phwesk!! finally some progress'.$id);
                    $this->set('_serialize', 'message');
                }
            } else {
                $this->beforeDisplaying();
                $this->Session->setFlash(__('The report could not be saved. Please, review the fields marked in red.'), 'flash_error');
            }
        } else {
            // $this->request->data = $this->Device->read(null);
            $this->request->data = $device;
        }

        // $this->set('attachments', $this->Device->Attachment->find('all', array('conditions'=> array('Attachment.device_id' => $device['Device']['id']))));
        $this->set('attachments', $device['Attachment']);
        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Device->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Device->Designation->find('list');
        $this->set(compact('designations'));
    }
/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Device->deactivate($this->Device->id)) {
            $this->Session->setFlash(__('Device deleted'), 'flash_success');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Device was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function admin_archive($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Device->id = $this->Device->Luhn_Verify($id);
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Device->saveField('submitted', 6)) {
            $this->Session->setFlash(__('The report has been Archived. You can view it in the Archived List'), 'flash_success');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Device was not Archived'));
        $this->redirect(array('action' => 'index'));
    }

    /**
    **          Utility functions here
    **/

    public function createDevice() {
        if($this->Auth->User('id')) {
            $this->request->data['Device']['user_id'] = $this->Auth->User('id');
            $this->request->data['Device']['designation_id'] = $this->Auth->User('designation_id');
            $this->request->data['Device']['county_id'] = $this->Auth->User('county_id');
            $this->request->data['Device']['reporter_name'] = $this->Auth->User('name');
            // $this->request->data['Device']['reporter_email'] = $this->Auth->User('email');
            $this->request->data['Device']['name_of_institution'] = $this->Auth->User('name_of_institution');
            // $this->request->data['Device']['address'] = $this->Auth->User('institution_address');
            $this->request->data['Device']['institution_code'] = $this->Auth->User('institution_code');
            $this->request->data['Device']['contact'] = $this->Auth->User('institution_contact');
            $this->request->data['Device']['reporter_phone'] = $this->Auth->User('phone_no');
        }
    }
}
