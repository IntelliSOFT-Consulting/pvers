<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
/**
 * Pqmps Controller
 *
 * @property Pqmp $Pqmp
 */
class PqmpsController extends AppController
{

    public $components = array('Search.Prg');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    /*public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'edit','view', 'find', 'download');
        $this->Security->blackHoleCallback = 'blackhole';
        if ($this->RequestHandler->isXml() || $this->RequestHandler->isAjax() || $this->request->params['action'] == 'edit')  $this->Security->csrfCheck = false;
    }

    public function blackhole($type) {
        $this->Session->setFlash(__('Sorry! The page has expired due to a '.$type.' error. Please refresh the page.'), 'flash_error');
        $this->redirect($this->referer());
    }*/
    /**
     * index method
     *
     * @return void
     */
    /*public function index() {
        $this->Pqmp->recursive = 0;
        $this->set('pqmps', $this->paginate());
    }*/
    public function reporter_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Pqmp->parseCriteria($this->passedArgs);
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Pqmp.user_id'] = $this->Auth->User('id');
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') $criteria['Pqmp.submitted'] = array(2);
        // $criteria['Pqmp.user_id'] = $this->Auth->User('id');
        // add deleted to criteria
        $criteria['Pqmp.deleted'] = false;
        if (isset($this->request->query['submitted']) && $this->request->query['submitted'] == 1) {
            $criteria['Pqmp.submitted'] = array(0, 1);
        } else {
            $criteria['Pqmp.submitted'] = array(2, 3);
        }
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Pqmp.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Country', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Pqmp->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Pqmp->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $countries = $this->Pqmp->Country->find('list', array('order' => array('Country.name' => 'ASC')));
        $this->set(compact('countries'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('pqmps', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function api_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;

        $page_options = array('5' => '5', '10' => '10', '25' => '25');
        (!empty($this->request->query('pages'))) ? $this->paginate['limit'] = $this->request->query('pages') :  $this->paginate['limit'] = reset($page_options);


        $criteria = $this->Pqmp->parseCriteria($this->passedArgs);
        $criteria['Pqmp.user_id'] = $this->Auth->User('id');

        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Pqmp.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Country', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Pqmp->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end csv export

        $this->set([
            'page_options', $page_options,
            'pqmps' => Sanitize::clean($this->paginate(), array('encode' => false)),
            'paging' => $this->request->params['paging'],
            '_serialize' => ['pqmps', 'page_options', 'paging']
        ]);
    }

    public function partner_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Pqmp->parseCriteria($this->passedArgs);
        $criteria['Pqmp.facility_name'] = $this->Auth->User('name_of_institution');
        $criteria['Pqmp.submitted'] = array(1, 2);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Pqmp.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Country', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Pqmp->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Pqmp->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $countries = $this->Pqmp->Country->find('list', array('order' => array('Country.name' => 'ASC')));
        $this->set(compact('countries'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('pqmps', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Pqmp->parseCriteria($this->passedArgs);
        $criteria['Pqmp.copied !='] = '1';
        if (isset($this->request->query['submitted']) && $this->request->query['submitted'] == 1) {
            $criteria['Pqmp.submitted'] = array(0, 1);
        } else {
            $criteria['Pqmp.submitted'] = array(2, 3);
        }

        // if (!isset($this->passedArgs['submit'])) $criteria['Pqmp.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Pqmp.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Country', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Pqmp->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Pqmp->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $countries = $this->Pqmp->Country->find('list', array('order' => array('Country.name' => 'ASC')));
        $this->set(compact('countries'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('pqmps', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function reviewer_index()
    {
        # code...
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Pqmp->parseCriteria($this->passedArgs);
        $criteria['Pqmp.copied !='] = '1';
        if (isset($this->request->query['submitted']) && $this->request->query['submitted'] == 1) {
            $criteria['Pqmp.submitted'] = array(0, 1);
        } else {
            $criteria['Pqmp.submitted'] = array(2, 3);
        }
 
        $criteria['Pqmp.assigned_to'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Pqmp.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Country', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Pqmp->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Pqmp->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $countries = $this->Pqmp->Country->find('list', array('order' => array('Country.name' => 'ASC')));
        $this->set(compact('countries'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('pqmps', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($cpqmps = '')
    {
        //todo: check if data exists in $users
        $this->response->download('PQMPs_' . date('Ymd_Hi') . '.csv'); // <= setting the file name
        $this->set(compact('cpqmps'));
        $this->layout = false;
        $this->render('csv_export');
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function reporter_view($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the PQHPT report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            // $this->response->download('PQMP_'.$pqmp['Pqmp']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Pqmp->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Pqmp->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Pqmp->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $pqmp = $this->Pqmp->find('first', array(
            'conditions' => array('Pqmp.id' => $id),
            'contain' => array(
                'Country', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment',
                'PqmpOriginal', 'PqmpOriginal.Country', 'PqmpOriginal.County', 'PqmpOriginal.SubCounty', 'PqmpOriginal.Attachment', 'PqmpOriginal.Designation', 'PqmpOriginal.ExternalComment'
            )
        ));
        $this->set('pqmp', $pqmp);

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('PQMP_' . $pqmp['Pqmp']['id'] . '.pdf');
        }
    }

    public function api_view($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->set([
                'status' => 'failed',
                'message' => 'Could not verify the PQHPT report ID. Please ensure the ID is correct.',
                '_serialize' => ['status', 'message']
            ]);
        } else {
            if (strpos($this->request->url, 'pdf') !== false) {
                $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
                // $this->response->download('PQMP_'.$pqmp['Pqmp']['id'].'.pdf');
            }

            $pqmp = $this->Pqmp->find('first', array(
                'conditions' => array('Pqmp.id' => $id),
                'contain' => array(
                    'Country', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment',
                    'PqmpOriginal', 'PqmpOriginal.Country', 'PqmpOriginal.County', 'PqmpOriginal.SubCounty', 'PqmpOriginal.Attachment', 'PqmpOriginal.Designation', 'PqmpOriginal.ExternalComment'
                )
            ));

            $this->set([
                'status' => 'success',
                'pqmp' => $pqmp,
                '_serialize' => ['status', 'pqmp']
            ]);
        }
    }

    public function partner_view($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the PQHPT report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            // $this->response->download('PQMP_'.$pqmp['Pqmp']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Pqmp->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Pqmp->id));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Pqmp->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $pqmp = $this->Pqmp->find('first', array(
            'conditions' => array('Pqmp.id' => $id),
            'contain' => array(
                'Country', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment',
                'PqmpOriginal', 'PqmpOriginal.Country', 'PqmpOriginal.County', 'PqmpOriginal.SubCounty', 'PqmpOriginal.Attachment', 'PqmpOriginal.Designation', 'PqmpOriginal.ExternalComment'
            )
        ));
        $this->set('pqmp', $pqmp);

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('PQMP_' . $pqmp['Pqmp']['id'] . '.pdf');
        }
    }

    public function manager_view($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the PQHPT report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            // $this->response->download('PQMP_'.$pqmp['Pqmp']['id'].'.pdf');
        }

        $pqmp = $this->Pqmp->find('first', array(
            'conditions' => array('Pqmp.id' => $id),
            'contain' => array(
                'Country', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment',
                'PqmpOriginal', 'PqmpOriginal.Country', 'PqmpOriginal.County', 'PqmpOriginal.SubCounty', 'PqmpOriginal.Attachment', 'PqmpOriginal.Designation', 'PqmpOriginal.ExternalComment'
            )
        ));
        $managers=$this->Pqmp->User->find('list',array(
            'conditions'=>array(
                'User.group_id'=>6
            )
        ));
        $this->set(['pqmp'=>$pqmp,'managers'=>$managers]);

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PQMP_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('PQMP_' . $pqmp['Pqmp']['id'] . '.pdf');
        }
    }


    // Assign the report to the evaluator
    public function manager_assign()
    {
        # code...
        $id = $this->request->data['Pqmp']['report_id'];
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the Pqmp report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        $this->Pqmp->saveField('assigned_by', $this->request->data['Pqmp']['assigned_by']);
        $this->Pqmp->saveField('assigned_to', $this->request->data['Pqmp']['assigned_to']);
        $this->Pqmp->saveField('assigned_date', date("Y-m-d H:i:s"));

        // Send an asignment alert::::


        $this->Session->setFlash(__('The Pqmp has been assigned successfully'), 'alerts/flash_success');
        $this->redirect(array('action' => 'view', $id));
    }

    public function manager_unassign($id = null)
    {
        # code...
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the Pqmp report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        $this->Pqmp->saveField('assigned_by', '');
        $this->Pqmp->saveField('assigned_to', '');
        $this->Pqmp->saveField('assigned_date', ''); 

        $this->Session->setFlash(__('The Pqmp has been unassigned successfully'), 'alerts/flash_success');
        $this->redirect(array('action' => 'view', $id));
    }

    /**
     * add method
     *
     * @return void
     */


    public function reporter_add()
    {
        // $count = $this->Pqmp->find('count',  array('conditions' => array(
        //     'Pqmp.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        // $count++;
        // $count = ($count < 10) ? "0$count" : $count;
        $this->Pqmp->create();
        $this->Pqmp->save(['Pqmp' => [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new', //'PQHPT/'.date('Y').'/'.$count,
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
        $this->Session->setFlash(__('The PQHPT has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Pqmp->id));
    }

    public function generateReferenceNumber()
    {

        $count = $this->Pqmp->find('count',  array(
            'fields' => 'Pqmp.reference_no',
            'conditions' => array(
                'Pqmp.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Pqmp.reference_no !=' => 'new'
            )
        ));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $reference = 'PQHPT/' . date('Y') . '/' . $count;

        //ensure this reference number is unique
        $exists = $this->Pqmp->find('count', array('conditions' => array('Pqmp.reference_no' => $reference)));
        if ($exists) {
            $this->generateReferenceNumber();
        }

        //
        return $reference;
    }

    public function reporter_edit($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            throw new NotFoundException(__('Invalid PQHPT'));
        }
        $pqmp = $this->Pqmp->read(null, $id);
        if ($pqmp['Pqmp']['submitted'] > 1) {
            $this->Session->setFlash(__('The pqmp has been submitted'), 'alerts/flash_info');
            $this->redirect(array('action' => 'view', $this->Pqmp->id));
        }
        if ($pqmp['Pqmp']['user_id'] !== $this->Auth->user('id')) {
            $this->Session->setFlash(__('You don\'t have permission to edit this PQHPT!!'), 'alerts/flash_error');
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';
            }
            if ($this->Pqmp->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Pqmp->saveField('submitted', 2);
                    $this->Pqmp->saveField('submitted_date', date("Y-m-d H:i:s"));
                    //lucian
                    if (!empty($pqmp['Pqmp']['reference_no']) && $pqmp['Pqmp']['reference_no'] == 'new') {

                        //call a function to generate the reference number
                        $reference = $this->generateReferenceNumber();
                        $this->Pqmp->saveField('reference_no', $reference);
                    }
                    //bokelo
                    $pqmp = $this->Pqmp->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_pqmp_submit')));
                    $variables = array(
                        'name' => $this->Auth->User('name'), 'reference_no' => $pqmp['Pqmp']['reference_no'],
                        'reference_link' => $html->link(
                            $pqmp['Pqmp']['reference_no'],
                            array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'reporter' => true, 'full_base' => true),
                            array('escape' => false)
                        ),
                        'modified' => $pqmp['Pqmp']['modified']
                    );
                    $datum = array(
                        'email' => $pqmp['Pqmp']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_pqmp_submit', 'model' => 'Pqmp',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                    );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);

                    //Send SMS
                    if (!empty($pqmp['Pqmp']['reporter_phone']) && strlen(substr($pqmp['Pqmp']['reporter_phone'], -9)) == 9 && is_numeric(substr($pqmp['Pqmp']['reporter_phone'], -9))) {
                        $datum['phone'] = '254' . substr($pqmp['Pqmp']['reporter_phone'], -9);
                        $variables['reference_url'] = Router::url(['controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'reporter' => true, 'full_base' => true]);
                        $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                        $this->QueuedTask->createJob('GenericSms', $datum);
                    }

                    //Notify managers
                    $users = $this->Pqmp->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                        $variables = array(
                            'name' => $user['User']['name'], 'reference_no' => $pqmp['Pqmp']['reference_no'],
                            'reference_link' => $html->link(
                                $pqmp['Pqmp']['reference_no'],
                                array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'manager' => true, 'full_base' => true),
                                array('escape' => false)
                            ),
                            'modified' => $pqmp['Pqmp']['modified']
                        );
                        $datum = array(
                            'email' => $user['User']['email'],
                            'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_pqmp_submit', 'model' => 'Pqmp',
                            'subject' => CakeText::insert($message['Message']['subject'], $variables),
                            'message' => CakeText::insert($message['Message']['content'], $variables)
                        );

                        $this->QueuedTask->createJob('GenericEmail', $datum);
                        $this->QueuedTask->createJob('GenericNotification', $datum);
                        // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                        // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                    }
                    //**********************************    END   *********************************
                    $message1 = "The PQHPT has been submitted to PPB. Please create a new SADR for the PQHPT.";
                    $message2 = "The PQHPT has been submitted to PPB. Please create a new Blood Transfusion Reaction for the PQHPT";
                    $message3 = "The PQHPT has been submitted to PPB. Please create a new Medical Device Incident for the PQHPT";
                    $message4 = "The PQHPT has been submitted to PPB. Please create a new AEFI for the PQHPT";
                    $message5 = "The PQHPT has been submitted to PPB. Please create a new Medication Error for the PQHPT";


                    if ($pqmp['Pqmp']['therapeutic_ineffectiveness']) {
                        $this->Session->setFlash(__($message1), 'alerts/flash_success');
                        $this->redirect(array('controller' => 'sadrs', 'action' => 'add', 'reporter' => true));
                    } else {
                        if ($pqmp['Pqmp']['adverse_reaction'] == "Yes") {
                            if ($pqmp['Pqmp']['medicinal_product'] || $pqmp['Pqmp']['herbal_product'] || $pqmp['Pqmp']['cosmeceuticals']) {
                                $this->Session->setFlash(__($message1), 'alerts/flash_success');
                                $this->redirect(array('controller' => 'sadrs', 'action' => 'add', $this->Pqmp->id, 'reporter' => true));
                            }
                            if ($pqmp['Pqmp']['blood_products']) {
                                $this->Session->setFlash(__($message2), 'alerts/flash_success');
                                $this->redirect(array('controller' => 'transfusions', 'action' => 'add', $this->Pqmp->id, 'reporter' => true));
                            }
                            if ($pqmp['Pqmp']['medical_device']) {
                                $this->Session->setFlash(__($message3), 'alerts/flash_success');
                                $this->redirect(array('controller' => 'devices', 'action' => 'add', $this->Pqmp->id, 'reporter' => true));
                            }
                            if ($pqmp['Pqmp']['product_vaccine']) {
                                $this->Session->setFlash(__($message4), 'alerts/flash_success');
                                $this->redirect(array('controller' => 'aefis', 'action' => 'add', $this->Pqmp->id, 'reporter' => true));
                            }
                        }
                        if ($pqmp['Pqmp']['medication_error'] == "Yes") {
                            $this->Session->setFlash(__($message5), 'alerts/flash_success');
                            $this->redirect(array('controller' => 'medications', 'action' => 'add', $this->Pqmp->id, 'reporter' => true));
                        }
                        $this->Session->setFlash(__('The PQHPT has been submitted to PPB'), 'alerts/flash_success');
                        $this->redirect(array('action' => 'view', $this->Pqmp->id));
                    }
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The PQHPT has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The PQHPT could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Pqmp->read(null, $id);
        }

        //$pqmp = $this->request->data;

        $this->set(compact('pqmp'));
        $counties = $this->Pqmp->County->find('list');
        $this->set(compact('counties'));
        $sub_counties = $this->Pqmp->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $countries = $this->Pqmp->Country->find('list');
        $this->set('countries', $countries);
    }


    public function api_add()
    {

        $this->Pqmp->create();
        $this->_attachments('Pqmp');

        $save_data = $this->request->data;
        $save_data['Pqmp']['user_id'] = $this->Auth->user('id');
        $save_data['Pqmp']['submitted'] = 2;
        //lucian
        if (empty($save_data['Pqmp']['reference_no'])) {
            $count = $this->Pqmp->find('count',  array(
                'fields' => 'Pqmp.reference_no',
                'conditions' => array(
                    'Pqmp.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Pqmp.reference_no !=' => 'new'
                )
            ));
            $count++;
            $count = ($count < 10) ? "0$count" : $count;
            $save_data['Pqmp']['reference_no'] = 'PQHPT/' . date('Y') . '/' . $count;
        }
        // $save_data['Pqmp']['report_type'] = 'Initial';
        //bokelo

        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = 'first';
            if ($this->Pqmp->saveAssociated($save_data, array('validate' => $validate, 'deep' => true))) {

                $pqmp = $this->Pqmp->read(null, $this->Pqmp->id);
                $id = $this->Pqmp->id;

                //******************       Send Email and Notifications to Applicant and Managers          *****************************
                $this->loadModel('Message');
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_pqmp_submit')));
                $variables = array(
                    'name' => $this->Auth->User('name'), 'reference_no' => $pqmp['Pqmp']['reference_no'],
                    'reference_link' => $html->link(
                        $pqmp['Pqmp']['reference_no'],
                        array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'reporter' => true, 'full_base' => true),
                        array('escape' => false)
                    ),
                    'modified' => $pqmp['Pqmp']['modified']
                );
                $datum = array(
                    'email' => $pqmp['Pqmp']['reporter_email'],
                    'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_pqmp_submit', 'model' => 'Pqmp',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                );

                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);
                $this->QueuedTask->createJob('GenericNotification', $datum);

                //Send SMS
                if (!empty($pqmp['Pqmp']['reporter_phone']) && strlen(substr($pqmp['Pqmp']['reporter_phone'], -9)) == 9 && is_numeric(substr($pqmp['Pqmp']['reporter_phone'], -9))) {
                    $datum['phone'] = '254' . substr($pqmp['Pqmp']['reporter_phone'], -9);
                    $variables['reference_url'] = Router::url(['controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'reporter' => true, 'full_base' => true]);
                    $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                    $this->QueuedTask->createJob('GenericSms', $datum);
                }

                //Notify managers
                $users = $this->Pqmp->User->find('all', array(
                    'contain' => array(),
                    'conditions' => array('User.group_id' => 2)
                ));
                foreach ($users as $user) {
                    $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $pqmp['Pqmp']['reference_no'],
                        'reference_link' => $html->link(
                            $pqmp['Pqmp']['reference_no'],
                            array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'], 'manager' => true, 'full_base' => true),
                            array('escape' => false)
                        ),
                        'modified' => $pqmp['Pqmp']['modified']
                    );
                    $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_pqmp_submit', 'model' => 'Pqmp',
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
                    'message' => 'The PQHPT has been submitted to PPB',
                    'pqmp' => $pqmp,
                    '_serialize' => ['status', 'message', 'pqmp']
                ]);
            } else {
                $this->set([
                    'status' => 'failed',
                    'message' => 'The PQHPT could not be saved. Please review the error(s) and resubmit and try again.',
                    'validation' => $this->Pqmp->validationErrors,
                    'pqmp' => $this->request->data,
                    '_serialize' => ['status', 'message', 'validation', 'pqmp']
                ]);
            }
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function manager_copy($id = null)
    {
        if ($this->request->is('post')) {
            $this->Pqmp->id = $id;
            if (!$this->Pqmp->exists()) {
                throw new NotFoundException(__('Invalid PQHPT'));
            }
            $pqmp = Hash::remove($this->Pqmp->find(
                'first',
                array(
                    'conditions' => array('Pqmp.id' => $id)
                )
            ), 'Pqmp.id');

            if ($pqmp['Pqmp']['copied']) {
                $this->Session->setFlash(__('A clean copy already exists. Click on edit to update changes.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }
            $data_save = $pqmp['Pqmp'];
            $data_save['pqmp_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Pqmp->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Pqmp->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                $this->Session->setFlash(__('Clean copy of ' . $data_save['reference_no'] . ' has been created'), 'alerts/flash_info');
                $this->redirect(array('action' => 'edit', $this->Pqmp->id));
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

    public function manager_edit($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            throw new NotFoundException(__('Invalid PQHPT'));
        }
        $pqmp = $this->Pqmp->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';
            }
            if ($this->Pqmp->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Pqmp->saveField('submitted', 2);
                    $this->Pqmp->saveField('submitted_date', date("Y-m-d H:i:s"));
                    $pqmp = $this->Pqmp->read(null, $id);

                    $this->Session->setFlash(__('The PQHPT has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Pqmp->id));
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The PQHPT has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The PQHPT could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Pqmp->read(null, $id);
        }

        //Manager will always edit a copied report
        $pqmp = $this->Pqmp->find('first', array(
            'conditions' => array('Pqmp.id' => $pqmp['Pqmp']['pqmp_id']),
            'contain' => array('Country', 'County', 'SubCounty', 'Attachment', 'Designation', 'ExternalComment')
        ));
        $this->set('pqmp', $pqmp);

        $counties = $this->Pqmp->County->find('list');
        $this->set(compact('counties'));
        $sub_counties = $this->Pqmp->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Pqmp->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $countries = $this->Pqmp->Country->find('list');
        $this->set('countries', $countries);
    }

    public function admin_edit($id = null)
    {
        $this->set('title_for_layout', 'Edit Pqmp ' . $id);
        $this->Pqmp->id = $this->Pqmp->Luhn_Verify($id);
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the pqmp ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'add'));
        } else {
            $pqmp = $this->Pqmp->read(null);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data)) {
                if (isset($this->request->data['cancelReport'])) {
                    $this->Session->setFlash(__('You have canceled a report'), 'flash_success');
                    $this->redirect('/');
                }
                $this->beforeSaving();
                $validate = false;
                if (isset($this->request->data['submitReport'])) {
                    $validate = 'first';
                }
                //Set Logged in user
                if ($this->Auth->user('id')) {
                    $this->request->data['Pqmp']['user_id'] = $this->Auth->user('id');
                }
                if (isset($this->request->data['Attachment']) && !empty($this->request->data['Attachment'])) {
                    foreach ($this->request->data['Attachment'] as $attachment) {
                        $dataToSave[]['Attachment'] = $attachment;
                    }
                }
                if (isset($dataToSave) && !$this->Attachment->saveAll($dataToSave, array('validate' => 'only'))) {
                    $this->beforeDisplaying();
                    $this->Session->setFlash(__('The attachments you provided are invalid. Please review the error and resubmit.'), 'flash_error');
                } else {
                    if ($this->Pqmp->saveAssociated($this->request->data, array('validate' => $validate))) {
                        if (!$this->request->is('ajax')) {
                            if ($validate == 'first') {
                                $this->Pqmp->saveField('submitted', 2);
                                $this->Session->setFlash(__('You have successfully saved the report.'), 'flash_success');
                                $this->redirect(array('action' => 'view', $this->Pqmp->Luhn($this->Pqmp->id)));
                            } else {
                                $this->Session->setFlash(__('The Pqmp has been saved'), 'flash_success');
                                $this->redirect(array('action' => 'edit', $this->Pqmp->Luhn($this->Pqmp->id)));
                            }
                        } else {
                            $this->set('message', 'phwesk!! finally some progress' . $id);
                            $this->set('_serialize', 'message');
                        }
                    } else {
                        $this->beforeDisplaying();
                        $this->Session->setFlash(__('The Pqmp could not be saved. Please, try again.'), 'flash_error');
                    }
                }
            } else {
                $this->Session->setFlash(__('The Report could not be saved. Please ensure the file size is less than 5MB'), 'flash_error');
                $this->redirect(array('action' => 'edit', $id));
            }
        } else {
            $this->request->data = $pqmp;
        }

        // $this->set('attachments', $pqmp['Attachment']);
        $counties = $this->Pqmp->County->find('list');
        $this->set(compact('counties'));
        $sub_counties = $this->Pqmp->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Pqmp->Designation->find('list');
        $this->set(compact('designations'));
        $countries = $this->Pqmp->Country->find('list');
        $this->set('countries', $countries);
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            throw new NotFoundException(__('Invalid pqmp'));
        }
        if ($this->Pqmp->delete()) {
            $this->Session->setFlash(__('Pqmp deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pqmp was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Pqmp->id = $this->Pqmp->Luhn_Verify($id);
        if (!$this->Pqmp->exists()) {
            throw new NotFoundException(__('Invalid pqmp'));
        }
        if ($this->Pqmp->deactivate($this->Pqmp->id)) {
            $this->Session->setFlash(__('Pqmp deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pqmp was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_archive($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Pqmp->id = $this->Pqmp->Luhn_Verify($id);
        if (!$this->Pqmp->exists()) {
            $this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Pqmp->saveField('submitted', 6)) {
            $this->Session->setFlash(__('The report has been Archived. You can view it in the Archived List'), 'flash_success');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Pqmp was not Archived'));
        $this->redirect(array('action' => 'index'));
    }
    /**
     *                  Utility functions
     *
     */

    public function createPqmp()
    {
        if ($this->Auth->User('id')) {
            $this->request->data['Pqmp']['user_id'] = $this->Auth->User('id');
            $this->request->data['Pqmp']['designation_id'] = $this->Auth->User('designation_id');
            $this->request->data['Pqmp']['county_id'] = $this->Auth->User('county_id');
            $this->request->data['Pqmp']['reporter_name'] = $this->Auth->User('name');
            // $this->request->data['Pqmp']['reporter_email'] = $this->Auth->User('email');
            $this->request->data['Pqmp']['facility_name'] = $this->Auth->User('name_of_institution');
            $this->request->data['Pqmp']['facility_code'] = $this->Auth->User('institution_code');
            $this->request->data['Pqmp']['facility_address'] = $this->Auth->User('institution_address');
            $this->request->data['Pqmp']['facility_phone'] = $this->Auth->User('institution_contact');
            $this->request->data['Pqmp']['contact_number'] = $this->Auth->User('phone_no');
        }
    }

    // function to delete a report
    public function reporter_delete($id = null)
    {
        $this->Pqmp->id = $id;
        if (!$this->Pqmp->exists()) {
            throw new NotFoundException(__('Invalid report'));
        }
        $this->request->onlyAllow('post', 'delete');
        //read the report
        $report = $this->Pqmp->read(null, $id);
        //update the report status to deleted
        $report['Pqmp']['deleted'] = true;
        $report['Pqmp']['deleted_date'] = date('Y-m-d H:i:s');
        //save the report withouth validation
        if ($this->Pqmp->save($report, array('validate' => false, 'deep' => true))) {
            $this->Session->setFlash(__('The report has been deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The report could not be deleted. Please, try again.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
    }
}
