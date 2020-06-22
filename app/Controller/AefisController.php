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
    public $components = array('Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');


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
        $this->Aefi->id = $this->Aefi->Luhn_Verify($this->request->data['Aefi']['id']);
        if ($this->Aefi->exists()) {
            $this->set('message', 'The report '.$id.' does not exist');
            $this->set('_serialize', 'message');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Aefi->saveField('vigiflow_id', $this->request->data['Aefi']['vigiflow_id'])) {
                $this->set('message', $this->request->data['Aefi']['vigiflow_id']);
                $this->set('_serialize', 'message');
            } else {
                $this->set('message', 'Could not save '.$this->request->data['Aefi']['vigiflow_id']);
                $this->set('_serialize', 'message');
            }
        }
    }
/**
 * index method
 */
    /*public function index() {
        $this->Aefi->recursive = 0;
        $this->set('aefis', $this->paginate());
    }*/
    public function reporter_index() {
        $this->Prg->commonProcess();
        $this->page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        $criteria['Aefi.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->paginate['contain'] = array('County');

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
        $criteria['Aefi.submitted'] = 2;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->paginate['contain'] = array('County');

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
    public function view($id = null) {
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
        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $aefi = $this->Aefi->read(null);
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
    }

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

        $aefi = $this->Aefi->read(null);
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
    }

    public function admin_view($id = null) {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $aefi = $this->Aefi->read(null);
        $this->set('aefi', $aefi);
        // $this->render('pdf/view');
        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            // $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
        }
        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'AEFI_' . $id,  'orientation' => 'portrait');
            $this->response->download('AEFI_'.$aefi['Aefi']['id'].'.pdf');
            $this->render('view');
        }
        if ($this->RequestHandler->isXml()) {
            $this->response->download('AEFI_'.date('Y_m_d_His'));
        }
    }

    public function admin_reply($id = null) {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        Configure::load('appwide');
        $this->set('root', Configure::read('Domain.root'));
        $this->set('aefi', $this->Aefi->read(null));
        $this->Aefi->saveField('submitted', 1);
    }

    public function find() {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($this->request->data['Aefi']['search']);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        } else {
            $this->redirect(array('action' => 'view', $this->request->data['Aefi']['search']));
        }

    }

/**
 * download methods
 */
    public function download($id = null) {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        }
        $aefi = $this->Aefi->read(null);
        $aefi = Sanitize::clean($aefi, array('escape' => true));
        $this->set('aefi', $aefi);
        //if(!$aefi['Aefi']['vigiflow_id']) {
            if ($this->RequestHandler->isXml()) {
                $this->Aefi->saveField('submitted', 3);
            }
            $this->response->download('AEFI_'.$aefi['Aefi']['id']);
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
        $this->set('title_for_layout', 'New AEFI');
        $response = array();
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Aefi->create();
            if (strpos($this->request->url,'xml') !== false) {
                //XML REQUEST
                // pr($this->request->data);
                $this->Aefi->set($this->request->data);
                unset($this->Aefi->validate['form_id']);
                $this->beforeSaving();
                if ($this->Aefi->saveAssociated($this->request->data)) {
                    $response['message'] = 'Thank you for submitting the report. A copy of the aefi report has been sent to the email address you provided';
                    $response['id'] = $this->Aefi->Luhn($this->Aefi->id);
                    $this->set('message', $response);
                } else {
                    $response['message'] = 'Sorry. We could not save your report. Please review the validation errors and resubmit.';
                    $this->set('message', $response);
                }
                //XML REQUEST
            } else {
                $this->Aefi->set($this->request->data);
                if($this->Auth->user('id')) {
                    $this->request->data['Aefi']['user_id'] = $this->Auth->user('id');
                }

                if ($this->request->data['Aefi']['report_type'] == 'Follow-up Report') {
                    #Check if report exists and owner
                    $aefi = Hash::remove($this->Aefi->find('first', array(
                                'contain' => array('AefiListOfVaccine', 'Attachment'),
                                'conditions' => array('Aefi.id' => $this->Aefi->Luhn_Verify($this->data['Aefi']['form_id']))
                                )
                            ), 'Aefi.id');
                    if (empty($aefi['Aefi'])) {
                        $this->Session->setFlash(__('Invalid AEFI id'), 'flash_warning');
                        $this->redirect(array('controller' => 'aefis', 'action' => 'add'));
                    } elseif ($aefi['Aefi']['submitted'] == 0) {
                        $this->Session->setFlash(__('Initial AEFI has not yet been submitted to PPB. Please submit first.'), 'flash_info');
                        $this->redirect(array('controller' => 'aefis', 'action' => 'edit', $this->data['Aefi']['form_id']));
                    }
                    $aefi = Hash::remove($aefi, 'AefiListOfVaccine.{n}.id');
                    $aefi = Hash::remove($aefi, 'Attachment.{n}.id');
                    $aefi['Aefi']['submitted'] = 0;
                    $data_save = $aefi['Aefi'];
                    $data_save['AefiListOfVaccine'] = $aefi['AefiListOfVaccine'];
                    if(isset($aefi['Attachment'])) $data_save['Attachment'] = $aefi['Attachment'];
                    $data_save['aefi_id'] = $this->Aefi->Luhn_Verify($this->data['Aefi']['form_id']);

                    // $count = $this->Aefi->find('count',  array('conditions' => array(
                    //             'Aefi.reference_no LIKE' => $aefi['Aefi']['reference_no'].'%',
                    //             )));
                    // $count = ($count < 10) ? "0$count" : $count;
                    $data_save['reference_no'] = $this->data['Aefi']['form_id'];
                    $data_save['report_type'] = 'Follow-up Report';
                    // $data_save['approved'] = 0;

                    if ($this->Aefi->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                            $this->Session->setFlash(__('Follow up '.$this->Aefi->Luhn($this->Aefi->id).' has been created'), 'flash_success');
                            $this->redirect(array('action' => 'edit', $this->Aefi->Luhn($this->Aefi->id)));            
                    } else {
                        $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                        $this->redirect($this->referer());
                    }
                } elseif ($this->request->data['Aefi']['report_type'] == 'Initial Report' && $this->Aefi->validates(array('fieldList' => array('device', 'report_type', 'reporter_email'))) && empty($this->data['Aefi']['bot_stop'])) {
                    $device = 0;
                    $fieldlist = array('device', 'report_type', 'reporter_email');
                    if($this->RequestHandler->isMobile()) {
                        $device = 2; // Mobile web devices
                        $this->request->data['Aefi']['device'] = 2; // Mobile web devices
                    }

                    if($this->Auth->user('id')) {
                        $this->createAefi();
                        $fieldlist = array('device', 'report_type', 'reporter_email', 'user_id', 'county_id', 'designation_id', 'reporter_name', 'reporter_email',
                                        'name_of_institution', 'address', 'institution_code', 'contact', 'reporter_phone');
                    }
                                            unset($this->Aefi->validate['county_id']);
                    if($this->Aefi->save($this->request->data, array('fieldList' => $fieldlist))) {
                        $this->Session->setFlash(__('Form for reporting medical devices. Note the form ID. An email has been sent to the address you provided containing the report ID.'), 'flash_success');
                        $this->redirect(array('action' => 'edit', $this->Aefi->Luhn($this->Aefi->id)));
                    } else {
                        $this->Session->setFlash(__('Hmm! Seems something went wrong!'), 'flash_error');
                    }
                } else {
                    $response['message'] = 'Could not create AEFI form. Please ensure the data is correct.';
                    $this->Session->setFlash(__($response['message']), 'flash_error');
                }
            }
        }
    }

    public function reporter_add() {        
        $count = $this->Aefi->find('count',  array('conditions' => array(
            'Aefi.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $this->Aefi->create();
        $this->Aefi->save(['Aefi' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'AEFI/'.date('Y').'/'.$count,
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
                        'contain' => array('AefiListOfVaccine'),
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
    public function edit($id = null) {
        $this->set('title_for_layout', 'Edit Aefi '.$id);
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            // throw new NotFoundException(__('Invalid aefi'));
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        } else {
            $aefi = $this->Aefi->read(null);
            if ($aefi['Aefi']['submitted'] > 1) {
                $this->Session->setFlash(__('The Report has been sent to PPB. You don\'t have permissions to edit it further.'), 'flash_error');
                $this->redirect(array('action' => 'view', $id));
            }
        }
        // pr($this->Aefi);
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
                    $this->request->data['Aefi']['user_id'] = $this->Auth->user('id');
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
                    if ($this->Aefi->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                        if (!$this->request->is('ajax')) {
                            if($validate == 'first') {
                                $this->Aefi->saveField('submitted', 2);
                                $this->Session->setFlash(__('Thank you for submitting the report.
                                A copy of the aefi report has been sent to the email address you provided'), 'flash_success');
                                $this->redirect(array('action' => 'view', $this->Aefi->Luhn($this->Aefi->id)));
                            } else {
                                $this->Session->setFlash(__('The aefi has been saved'), 'flash_success');
                                $this->redirect(array('action' => 'edit', $this->Aefi->Luhn($this->Aefi->id)));
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
            $this->request->data = $aefi;
        }

        // $this->set('attachments', $this->Aefi->Attachment->find('all', array('conditions'=> array('Attachment.aefi_id' => $aefi['Aefi']['id']))));
        // $this->set('attachments', $aefi['Attachment']);
        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Aefi->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Aefi->Designation->find('list');
        $this->set(compact('designations'));
    }

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
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Edit Aefi '.$id);
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            // throw new NotFoundException(__('Invalid aefi'));
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        } else {
            $aefi = $this->Aefi->read(null);
        }
        // pr($this->Aefi);
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['deleteReport'])) {
                $this->Session->setFlash(__('You have Deleted a report'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            }
            $this->beforeSaving();
            $validate = 'first';
            //Set Logged in user
            if($this->Auth->user('id')) {
                $this->request->data['Aefi']['user_id'] = $this->Auth->user('id');
            }
            // pr($this->data);
            if ($this->Aefi->saveAssociated($this->request->data, array('validate' => $validate))) {
                if (!$this->request->is('ajax')) {
                    $this->Session->setFlash(__('You have successfully saved the report'), 'flash_success');
                    $this->redirect(array('action' => 'edit', $this->Aefi->Luhn($this->Aefi->id)));
                } else {
                    $this->set('message', 'phwesk!! finally some progress'.$id);
                    $this->set('_serialize', 'message');
                }
            } else {
                $this->beforeDisplaying();
                $this->Session->setFlash(__('The report could not be saved. Please, review the fields marked in red.'), 'flash_error');
            }
        } else {
            // $this->request->data = $this->Aefi->read(null);
            $this->request->data = $aefi;
        }

        // $this->set('attachments', $this->Aefi->Attachment->find('all', array('conditions'=> array('Attachment.aefi_id' => $aefi['Aefi']['id']))));
        $this->set('attachments', $aefi['Attachment']);
        $counties = $this->Aefi->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Aefi->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Aefi->Designation->find('list');
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
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Aefi->deactivate($this->Aefi->id)) {
            $this->Session->setFlash(__('Aefi deleted'), 'flash_success');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Aefi was not deleted'), 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function admin_archive($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the medical devices report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Aefi->saveField('submitted', 6)) {
            $this->Session->setFlash(__('The report has been Archived. You can view it in the Archived List'), 'flash_success');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Aefi was not Archived'));
        $this->redirect(array('action' => 'index'));
    }

    /**
    **          Utility functions here
    **/

    public function createAefi() {
        if($this->Auth->User('id')) {
            $this->request->data['Aefi']['user_id'] = $this->Auth->User('id');
            $this->request->data['Aefi']['designation_id'] = $this->Auth->User('designation_id');
            $this->request->data['Aefi']['county_id'] = $this->Auth->User('county_id');
            $this->request->data['Aefi']['reporter_name'] = $this->Auth->User('name');
            // $this->request->data['Aefi']['reporter_email'] = $this->Auth->User('email');
            $this->request->data['Aefi']['name_of_institution'] = $this->Auth->User('name_of_institution');
            // $this->request->data['Aefi']['address'] = $this->Auth->User('institution_address');
            $this->request->data['Aefi']['institution_code'] = $this->Auth->User('institution_code');
            $this->request->data['Aefi']['contact'] = $this->Auth->User('institution_contact');
            $this->request->data['Aefi']['reporter_phone'] = $this->Auth->User('phone_no');
        }
    }
}
