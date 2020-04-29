<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Aefis Controller
 *
 * @property Aefi $Aefi
 */
class AefisController extends AppController {
    public $components = array('Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 'Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = array(
        array('field' => 'report_title', 'type' => 'value'),
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'submitted', 'type' => 'value'),
        array('field' => 'device', 'type' => 'value'),
        array('field' => 'start_date', 'type' => 'value'),
        array('field' => 'end_date', 'type' => 'value'),
    );

    public $uses = array('Aefi', 'Attachment');

    public function beforeFilter() {
        parent::beforeFilter();
        // add auth effectively to views
        $this->Auth->allow('index', 'add', 'edit','view', 'find', 'download');
        $this->Security->blackHoleCallback = 'blackhole';
        if ($this->RequestHandler->isXml() || $this->RequestHandler->isAjax() || $this->request->params['action'] == 'edit')  $this->Security->csrfCheck = false;
    }

    public function blackhole($type) {
        $this->Session->setFlash(__('Sorry! The page has expired due to a '.$type.' error. Please refresh the page.'), 'flash_error');
        $this->redirect($this->referer());
    }

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
    public function index() {
        $this->Aefi->recursive = 0;
        $this->set('aefis', $this->paginate());
    }

    public function aefiIndex() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        if (isset($this->passedArgs['id']) && $this->Aefi->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Aefi->Luhn_Verify($this->passedArgs['id']);
        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        if($this->Auth->User('group_id') != 4) $criteria['Aefi.user_id'] = $this->Auth->user('id');
        else $criteria['Aefi.institution_code'] = $this->Auth->user('ward');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->Aefi->recursive = -1;

        if (strpos($this->request->url,'xls') !== false){
            $this->helpers[] = 'PhpExcel';
            $this->Aefi->recursive = 1;
            $routes = $this->Aefi->AefiListOfDrug->Route->find('list');
            $this->set(compact('routes'));
            $frequency = $this->Aefi->AefiListOfDrug->Frequency->find('list');
            $this->set(compact('frequency'));
            $dose = $this->Aefi->AefiListOfDrug->Dose->find('list');
            $this->set(compact('dose'));
        }
        if ($this->RequestHandler->isXml()) {
            $this->Aefi->recursive = 1;
            $this->response->download('AEFIS_'.date('Y_m_d_His'));
        }
        $this->set('aefis', $this->paginate());
    }

    public function admin_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        if (isset($this->passedArgs['id']) && $this->Aefi->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Aefi->Luhn_Verify($this->passedArgs['id']);
        $criteria = $this->Aefi->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Aefi.created' => 'desc');
        $this->Aefi->recursive = -1;

        if (strpos($this->request->url,'xls') !== false){
            $this->helpers[] = 'PhpExcel';
            $this->Aefi->recursive = 1;
            $routes = $this->Aefi->AefiListOfDrug->Route->find('list');
            $this->set(compact('routes'));
            $frequency = $this->Aefi->AefiListOfDrug->Frequency->find('list');
            $this->set(compact('frequency'));
            $dose = $this->Aefi->AefiListOfDrug->Dose->find('list');
            $this->set(compact('dose'));
        }
        if ($this->RequestHandler->isXml()) {
            $this->Aefi->recursive = 1;
            $this->response->download('AEFIS_'.date('Y_m_d_His'));
        }
        $this->set('aefis', $this->paginate());
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
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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

    public function admin_view($id = null) {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
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
        if ($this->RequestHandler->isXml()) {
            $this->response->download('AEFI_'.date('Y_m_d_His'));
        }
    }

    public function admin_reply($id = null) {
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
                    if (empty($aefi['Aefi']['id'])) {
                        $this->Session->setFlash(__('Invalid AEFI id'), 'flash_warning');
                        $this->redirect(array('controller' => 'aefis', 'action' => 'add'));
                    }
                    $aefi = Hash::remove($aefi, 'AefiListOfVaccine.{n}.id');
                    $aefi = Hash::remove($aefi, 'Attachment.{n}.id');
                    $data_save = $aefi['Aefi'];
                    $data_save['AefiListOfVaccine'] = $sae['AefiListOfVaccine'];
                    $data_save['Attachment'] = $sae['Attachment'];
                    $data_save['aefi_id'] = $this->Aefi->Luhn_Verify($this->data['Aefi']['form_id']);

                    $count = $this->Aefi->find('count',  array('conditions' => array(
                                'Sae.reference_no LIKE' => $sae['Sae']['reference_no'].'%',
                                )));
                    $count = ($count < 10) ? "0$count" : $count;
                    $data_save['reference_no'] = $sae['Sae']['reference_no'].'_F'.$count;
                    $data_save['report_type'] = 'Followup';
                    $data_save['approved'] = 0;

                    if ($this->Sae->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                            $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                            $this->redirect(array('action' => 'edit', $this->Sae->id));               
                    } else {
                        $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                        $this->redirect($this->referer());
                    }
                } elseif ($this->request->data['Aefi']['report_type'] == 'Initial Report' && $this->Aefi->validates(array('fieldList' => $fieldlist)) && empty($this->data['Aefi']['bot_stop'])) {
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
                        $this->Session->setFlash(__('Form for reporting adverse event following immunization. Note the form ID. An email has been sent to the address you provided containing the report ID.'), 'flash_success');
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
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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

    public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Edit Aefi '.$id);
        $this->Aefi->id = $this->Aefi->Luhn_Verify($id);
        if (!$this->Aefi->exists()) {
            // throw new NotFoundException(__('Invalid aefi'));
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
            $this->Session->setFlash(__('Could not verify the adverse event following immunization report ID. Please ensure the ID is correct.'), 'flash_error');
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
