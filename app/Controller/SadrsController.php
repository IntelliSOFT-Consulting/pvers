<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('HttpSocket', 'Network/Http');

/**
 * Sadrs Controller
 *
 * @property Sadr $Sadr
 */
class SadrsController extends AppController {
    public $components = array(
            // 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
            'Search.Prg', 
            // 'RequestHandler'
            );
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

/**
 * index method
 */

    public function reporter_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Sadr.user_id'] = $this->Auth->User('id');        
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') $criteria['Sadr.submitted'] = array(2);     
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
        $this->paginate['contain'] = array('County', 'SadrListOfDrug', 'SadrDescription');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sadr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end csv export
        $this->set('page_options', $this->page_options);
        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Sadr->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function partner_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.name_of_institution'] = $this->Auth->User('name_of_institution');        
        $criteria['Sadr.submitted'] = array(1, 2);        
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
        $this->paginate['contain'] = array('County', 'SadrListOfDrug', 'SadrDescription');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sadr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end csv export
        $this->set('page_options', $this->page_options);
        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Sadr->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index() {
        $this->Prg->commonProcess();
        // debug($this->request->query['pages']);
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (!empty($this->request->query['pages'])) $this->paginate['limit'] = $this->request->query['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        // $criteria['Sadr.submitted'] = 2;
        $criteria['Sadr.copied !='] = '1';
        if (!isset($this->passedArgs['submit'])) $criteria['Sadr.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sadr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'limit' => 1000)
              ));
        }
        //end csv export
        $this->set('page_options', $this->page_options);
        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Sadr->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($csadrs = ''){
        /*$_serialize = 'csadrs';
        $_header = array('Id');
        $_extract = array('Sadr.id');

        // $this->response->download('AEFIS_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->viewClass = 'CsvView.Csv';
        $this->set(compact('csadrs', '_serialize', '_header', '_extract'));*/
        $this->response->download('SADRs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('csadrs'));
        $this->layout = false;
        $this->render('csv_export');
    }

    public function institutionCodes() {
        if($this->Auth->user('institution_code')) {
            $this->Sadr->recursive = -1;
            $this->paginate = array(
                'conditions' => array('Sadr.institution_code' => $this->Auth->user('institution_code')),
                'fields' => array('Sadr.report_title', 'Sadr.created'),
                'limit' => 25,
                'order' => array(
                    'Sadr.created' => 'asc'
                )
            );
            $this->set('sadrs', $this->paginate());
        }
    }
/**
 * view methods
 */
    public function reporter_view($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the SADR report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Sadr->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Sadr->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Sadr->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $id),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'SadrListOfMedicine', 'SadrListOfMedicine.Route', 'SadrListOfMedicine.Frequency', 'SadrListOfMedicine.Dose', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('sadr', $sadr);

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }
    }

    public function manager_view($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the SADR report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }

        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $id),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'SadrListOfMedicine', 'SadrListOfMedicine.Route', 'SadrListOfMedicine.Frequency', 'SadrListOfMedicine.Dose', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment', 
                'SadrOriginal', 'SadrOriginal.SadrDescription', 'SadrOriginal.SadrListOfDrug', 'SadrOriginal.SadrListOfDrug.Route', 'SadrOriginal.SadrListOfDrug.Frequency', 'SadrOriginal.SadrListOfDrug.Dose', 'SadrOriginal.SadrListOfMedicine', 'SadrOriginal.SadrListOfMedicine.Route', 'SadrOriginal.SadrListOfMedicine.Frequency', 'SadrOriginal.SadrListOfMedicine.Dose', 'SadrOriginal.County', 'SadrOriginal.SubCounty', 'SadrOriginal.Attachment', 'SadrOriginal.Designation', 'SadrOriginal.ExternalComment')
            ));
        $this->set('sadr', $sadr);


        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }
    }

    public function partner_view($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the SADR report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            // $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }

        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $id),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'SadrListOfMedicine', 'SadrListOfMedicine.Route', 'SadrListOfMedicine.Frequency', 'SadrListOfMedicine.Dose', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment', 
                'SadrOriginal', 'SadrOriginal.SadrListOfDrug', 'SadrOriginal.SadrListOfDrug.Route', 'SadrOriginal.SadrListOfDrug.Frequency', 'SadrOriginal.SadrListOfDrug.Dose', 'SadrOriginal.SadrListOfMedicine', 'SadrOriginal.SadrListOfMedicine.Route', 'SadrOriginal.SadrListOfMedicine.Frequency', 'SadrOriginal.SadrListOfMedicine.Dose', 'SadrOriginal.County', 'SadrOriginal.SubCounty', 'SadrOriginal.Attachment', 'SadrOriginal.Designation', 'SadrOriginal.ExternalComment')
            ));
        $this->set('sadr', $sadr);


        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }
    }

/**
 * download methods
 */
    public function download($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $id),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'County', 'SubCounty', 'Attachment', 'Designation')
            ));
        $sadr = Sanitize::clean($sadr, array('escape' => true));
        $this->set('sadr', $sadr);
        $this->response->download('SADR_'.$sadr['Sadr']['id'].'.xml');
    }

    public function vigiflow($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $id),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'County', 'SubCounty', 'Attachment', 'Designation')
            ));
        $sadr = Sanitize::clean($sadr, array('escape' => true));

        $view = new View($this,false);
        $view->viewPath='Sadrs/xml';  // Directory inside view directory to search for .ctp files
        $view->layout=false; // if you want to disable layout
        $view->set('sadr', $sadr); // set your variables for view here
        $html=$view->render('download'); 

        // debug($html);
        $HttpSocket = new HttpSocket();
        // string data
        $results = $HttpSocket->post(
            'https://api.who-umc.org/vigiflow/icsrs', 
            // 'https://api.who-umc.org/demo/vigiflow/icsrs',
            $html,
            array('header' => array('umc-client-key' => '5ab835c4-3179-4590-bcd2-ff3c27d6b8ff'))
        );

        // debug($results->code);
        // debug($results->body);
        if ($results->isOk()) {
            $body = $results->body;
            $this->Sadr->saveField('vigiflow_message', $body);
            $this->Sadr->saveField('vigiflow_date', date('Y-m-d H:i:s'));
            $resp = json_decode($body, true);
            if(json_last_error() == JSON_ERROR_NONE) {
                $this->Sadr->saveField('vigiflow_ref', $resp['MessageId']);
            }
            $this->Flash->success('Vigiflow integration success!!');
            $this->Flash->success($body);
            $this->redirect($this->referer());
        } else {
            $body = $results->body;
            $this->Sadr->saveField('vigiflow_message', $body);
            $this->Flash->error('Error sending report to vigiflow:');
            $this->Flash->error($body);
            $this->redirect($this->referer());
        }
        $this->autoRender = false ;
    }

    public function e2b($id = null) {
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrDescription', 'SadrOtherDrugs', 'Attachments', 'ReportStages', 'Reactions']
        ]);        
        
        $stage1  = $this->Sadrs->ReportStages->newEntity();
        $stage1->model = 'Sadrs';
        $stage1->stage = 'VigiBase';
        $stage1->description = 'Stage 9';
        $stage1->stage_date = date("Y-m-d H:i:s");
        $sadr->report_stages = [$stage1];
        $sadr->status = 'VigiBase';
        $this->Sadrs->save($sadr);

        $designations = $this->Sadrs->Designations->find('list', array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set('_serialize', false);
        $this->set(compact('sadr', 'doses', 'routes'));
        /*$query = $this->Sadrs->query();
        $query->update()
                    ->set(['status' => 'E2B'])
                    ->where(['id' => $sadr->id])
                    ->execute();*/

        $this->response->download(($sadr->submitted==2) ? str_replace('/', '_', $sadr->reference_number).'.xml' : 'ADR_'.$sadr->created->i18nFormat('dd-MM-yyyy_HHmmss').'.xml');
    }

/**
 * add method
 *
 * @return void
 */

    public function reporter_followup($id = null) {
        if ($this->request->is('post')) {
            $this->Sadr->id = $id;
            if (!$this->Sadr->exists()) {
                throw new NotFoundException(__('Invalid SADR'));
            }
            $sadr = Hash::remove($this->Sadr->find('first', array(
                        'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfMedicine'),
                        'conditions' => array('Sadr.id' => $id)
                        )
                    ), 'Sadr.id');

            $sadr = Hash::remove($sadr, 'SadrListOfDrug.{n}.id');
            $sadr = Hash::remove($sadr, 'SadrListOfMedicine.{n}.id');
            $data_save = $sadr['Sadr'];
            $data_save['SadrListOfDrug'] = $sadr['SadrListOfDrug'];
            if(isset($sadr['SadrListOfMedicine'])) $data_save['SadrListOfMedicine'] = $sadr['SadrListOfMedicine'];
            $data_save['sadr_id'] = $id;

            $count = $this->Sadr->find('count',  array('conditions' => array(
                        'Sadr.reference_no LIKE' => $sadr['Sadr']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $sadr['Sadr']['reference_no'].'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Sadr->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Sadr->id));               
            } else {
                $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

    public function reporter_add() {        
        // $count = $this->Sadr->find('count',  array('conditions' => array(
        //     'Sadr.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        // $count++;
        // $count = ($count < 10) ? "0$count" : $count;
        $this->Sadr->create();
        $this->Sadr->save(['Sadr' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'new',//'SADR/'.date('Y').'/'.$count,
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
        $this->Session->setFlash(__('The SADR has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Sadr->id));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */

    public function reporter_edit($id = null) { 
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            throw new NotFoundException(__('Invalid SADR'));
        }
        $sadr = $this->Sadr->read(null, $id);
        if ($sadr['Sadr']['submitted'] > 1) {
                $this->Session->setFlash(__('The sadr has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Sadr->id));
        }
        if ($sadr['Sadr']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this SADR!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Sadr->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Sadr->saveField('submitted', 2);
                    //lucian
                    $count = $this->Sadr->find('count',  array(
                        'fields' => 'Sadr.reference_no',
                        'conditions' => array('Sadr.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Sadr.reference_no !=' => 'new'
                        )
                        ));
                    $count++;
                    $count = ($count < 10) ? "0$count" : $count; 
                    $this->Sadr->saveField('reference_no', 'SADR/'.date('Y').'/'.$count);
                    //bokelo
                    $sadr = $this->Sadr->read(null, $id);

                    //******************       Send Email and Notifications to Reporter and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_sadr_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $sadr['Sadr']['reference_no'],
                      'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $sadr['Sadr']['modified']
                      );
                    $datum = array(
                        'email' => $sadr['Sadr']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_sadr_submit', 'model' => 'Sadr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Sadr->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $sadr['Sadr']['reference_no'], 
                        'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $sadr['Sadr']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_sadr_submit', 'model' => 'Sadr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The SADR has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Sadr->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The SADR has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The SADR could not be saved. Please review the error(s) and resubmit and try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Sadr->read(null, $id);
        }

        //$sadr = $this->request->data;

        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Sadr->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Sadr->Designation->find('list');
        $this->set(compact('designations'));
        $routes = $this->Sadr->SadrListOfDrug->Route->find('list');
        $this->set(compact('routes'));
        $frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
        $this->set(compact('frequency'));
        $dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
        $this->set(compact('dose'));
    }

    public function manager_copy($id = null) {
        if ($this->request->is('post')) {
            $this->Sadr->id = $id;
            if (!$this->Sadr->exists()) {
                throw new NotFoundException(__('Invalid SADR'));
            }
            $sadr = Hash::remove($this->Sadr->find('first', array(
                        'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfMedicine'),
                        'conditions' => array('Sadr.id' => $id)
                        )
                    ), 'Sadr.id');

            if($sadr['Sadr']['copied']) {
                $this->Session->setFlash(__('A clean copy already exists. Click on edit to update changes.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));   
            }
            $sadr = Hash::remove($sadr, 'SadrListOfDrug.{n}.id');
            $sadr = Hash::remove($sadr, 'SadrListOfMedicine.{n}.id');
            $data_save = $sadr['Sadr'];
            $data_save['SadrListOfDrug'] = $sadr['SadrListOfDrug'];
            if(isset($sadr['SadrListOfMedicine'])) $data_save['SadrListOfMedicine'] = $sadr['SadrListOfMedicine'];
            $data_save['sadr_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Sadr->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Sadr->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Clean copy of '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Sadr->id));               
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

    public function manager_edit($id = null) { 
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            throw new NotFoundException(__('Invalid SADR'));
        }
        $sadr = $this->Sadr->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            // $validate = 'first';                
            if ($this->Sadr->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Sadr->saveField('submitted', 2);
                    $sadr = $this->Sadr->read(null, $id);                    

                    $this->Session->setFlash(__('The SADR has been saved'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Sadr->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The SADR has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The SADR could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Sadr->read(null, $id);
        }

        //Manager will always edit a copied report
        $sadr = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $sadr['Sadr']['sadr_id']),
                'contain' => array('SadrListOfDrug', 'SadrDescription', 'SadrListOfDrug.Route', 'SadrListOfDrug.Frequency', 'SadrListOfDrug.Dose', 'SadrListOfMedicine', 'SadrListOfMedicine.Route', 'SadrListOfMedicine.Frequency', 'SadrListOfMedicine.Dose', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment')
            ));
        $this->set('sadr', $sadr);


        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }

        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Sadr->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Sadr->Designation->find('list');
        $this->set(compact('designations'));
        $routes = $this->Sadr->SadrListOfDrug->Route->find('list');
        $this->set(compact('routes'));
        $frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
        $this->set(compact('frequency'));
        $dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
        $this->set(compact('dose'));
    }

}
