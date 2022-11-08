<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
/**
 * Devices Controller
 *
 * @property Device $Device
 */
class DevicesController extends AppController
{
    public $components = array('Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    /**
     * index method
     */
    public function reporter_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $criteria['Device.user_id'] = $this->Auth->User('id');
        //add deleted = 0 to criteria
        $criteria['Device.deleted'] = false;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Device->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Device->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('devices', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function api_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;

        $page_options = array('5' => '5', '10' => '10', '25' => '25');
        (!empty($this->request->query('pages'))) ? $this->paginate['limit'] = $this->request->query('pages') :  $this->paginate['limit'] = reset($page_options);


        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $criteria['Device.user_id'] = $this->Auth->User('id');

        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation', 'ListOfDevice');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Device->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end csv export

        $this->set([
            'page_options', $page_options,
            'devices' => Sanitize::clean($this->paginate(), array('encode' => false)),
            'paging' => $this->request->params['paging'],
            '_serialize' => ['devices', 'page_options', 'paging']
        ]);
    }

    public function partner_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $criteria['Device.name_of_institution'] = $this->Auth->User('name_of_institution');
        $criteria['Device.submitted'] = array(1, 2);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Device->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Device->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('devices', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function manager_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Device->parseCriteria($this->passedArgs);
        $criteria['Device.copied !='] = '1';
        if (!isset($this->passedArgs['submit'])) $criteria['Device.submitted'] = array(2, 3);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Device.created' => 'desc');
        $this->paginate['contain'] = array('County', 'Designation');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
            $this->csv_export($this->Device->find(
                'all',
                array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
            ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $this->set('devices', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    private function csv_export($cdevices = '')
    {
        //todo: check if data exists in $users
        $this->response->download('DEVICES_' . date('Ymd_Hi') . '.csv'); // <= setting the file name
        $this->set(compact('cdevices'));
        $this->layout = false;
        $this->render('csv_export');
    }

    public function institutionCodes()
    {
        if ($this->Auth->user('institution_code')) {
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

    public function reporter_view($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the DEVICE report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
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
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('DEVICE_' . $device['Device']['id'] . '.pdf');
        }
    }

    public function api_view($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            $this->set([
                'status' => 'failed',
                'message' => 'Could not verify the DEVICE report ID. Please ensure the ID is correct.',
                '_serialize' => ['status', 'message']
            ]);
        } else {
            if (strpos($this->request->url, 'pdf') !== false) {
                $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
                // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
            }

            $device = $this->Device->find('first', array(
                'conditions' => array('Device.id' => $id),
                'contain' => array('ListOfDevice', 'County',  'Attachment', 'Designation', 'ExternalComment')
            ));

            $this->set([
                'status' => 'success',
                'device' => $device,
                '_serialize' => ['status', 'device']
            ]);
        }
    }

    public function manager_view($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the DEVICE report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
            // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }

        $device = $this->Device->find('first', array(
            'conditions' => array('Device.id' => $id),
            'contain' => array(
                'ListOfDevice', 'County', 'Attachment', 'Designation', 'ExternalComment',
                'DeviceOriginal', 'DeviceOriginal.ListOfDevice', 'DeviceOriginal.County',  'DeviceOriginal.Attachment', 'DeviceOriginal.Designation', 'DeviceOriginal.ExternalComment'
            )
        ));
        $this->set('device', $device);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('DEVICE_' . $device['Device']['id'] . '.pdf');
        }
    }

    public function partner_view($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            $this->Session->setFlash(__('Could not verify the DEVICE report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
            // $this->response->download('DEVICE_'.$device['Device']['id'].'.pdf');
        }

        $device = $this->Device->find('first', array(
            'conditions' => array('Device.id' => $id),
            'contain' => array(
                'ListOfDevice', 'County', 'Attachment', 'Designation', 'ExternalComment',
                'DeviceOriginal', 'DeviceOriginal.ListOfDevice', 'DeviceOriginal.County',  'DeviceOriginal.Attachment', 'DeviceOriginal.Designation', 'DeviceOriginal.ExternalComment'
            )
        ));
        $this->set('device', $device);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'DEVICE_' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('DEVICE_' . $device['Device']['id'] . '.pdf');
        }
    }

    /**
     * add method
     *
     * @return void
     */

    public function reporter_add()
    {
        // $count = $this->Device->find('count',  array('conditions' => array(
        //     'Device.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        // $count++;
        // $count = ($count < 10) ? "0$count" : $count;
        $this->Device->create();
        $this->Device->save(['Device' => [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new', //'MD/'.date('Y').'/'.$count,
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

    public function reporter_followup($id = null)
    {
        if ($this->request->is('post')) {
            $this->Device->id = $id;
            if (!$this->Device->exists()) {
                throw new NotFoundException(__('Invalid Medical Device Report ID'));
            }
            $device = Hash::remove($this->Device->find(
                'first',
                array(
                    'contain' => array('ListOfDevice', 'Attachment'),
                    'conditions' => array('Device.id' => $id)
                )
            ), 'Device.id');

            $device = Hash::remove($device, 'ListOfDevice.{n}.id');
            $device = Hash::remove($device, 'Attachment.{n}.id');
            $data_save = $device['Device'];
            // $data_save['ListOfDevice'] = $device['ListOfDevice'];
            if (isset($device['ListOfDevice'])) $data_save['ListOfDevice'] = $device['ListOfDevice'];
            if (isset($device['Attachment'])) $data_save['Attachment'] = $device['Attachment'];
            $data_save['device_id'] = $id;

            $count = $this->Device->find('count',  array('conditions' => array(
                'Device.reference_no LIKE' => $device['Device']['reference_no'] . '%',
            )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $device['Device']['reference_no']; //.'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Device->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                $this->Session->setFlash(__('Follow up ' . $data_save['reference_no'] . ' has been created'), 'alerts/flash_info');
                $this->redirect(array('action' => 'edit', $this->Device->id));
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

    public function generateReferenceNumber()
    {
        $count = $this->Device->find('count',  array(
            'fields' => 'Device.reference_no',
            'conditions' => array(
                'Device.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Device.reference_no !=' => 'new'
            )
        ));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;

        $reference_no = 'MD/' . date('Y') . '/' . $count;

        //ensure the reference number is unique
        $exists = $this->Device->find('count',  array(
            'fields' => 'Device.reference_no',
            'conditions' => array('Device.reference_no' => $reference_no)
        ));
        if ($exists > 0) $reference_no = $this->generateReferenceNumber();

        return $reference_no;
    }

    public function reporter_edit($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid DEVICE'));
        }
        $device = $this->Device->read(null, $id);
        if ($device['Device']['submitted'] > 1) {
            $this->Session->setFlash(__('The medical device incident has been submitted'), 'alerts/flash_info');
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
                    $this->Device->saveField('submitted_date', date("Y-m-d H:i:s"));
                    //lucian
                    // debug($device);
                    // exit;
                    if (!empty($device['Device']['reference_no']) && $device['Device']['reference_no'] == 'new') {
                        $reference = $this->generateReferenceNumber();

                        $this->Device->saveField('reference_no', $reference);
                    }
                    //bokelo
                    $device = $this->Device->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_device_submit')));
                    $variables = array(
                        'name' => $this->Auth->User('name'), 'reference_no' => $device['Device']['reference_no'],
                        'reference_link' => $html->link(
                            $device['Device']['reference_no'],
                            array('controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'reporter' => true, 'full_base' => true),
                            array('escape' => false)
                        ),
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

                    //Send SMS
                    if (!empty($device['Device']['reporter_phone']) && strlen(substr($device['Device']['reporter_phone'], -9)) == 9 && is_numeric(substr($device['Device']['reporter_phone'], -9))) {
                        $datum['phone'] = '254' . substr($device['Device']['reporter_phone'], -9);
                        $variables['reference_url'] = Router::url(['controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'reporter' => true, 'full_base' => true]);
                        $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                        $this->QueuedTask->createJob('GenericSms', $datum);
                    }

                    //Notify managers
                    $users = $this->Device->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                        $variables = array(
                            'name' => $user['User']['name'], 'reference_no' => $device['Device']['reference_no'],
                            'reference_link' => $html->link(
                                $device['Device']['reference_no'],
                                array('controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'manager' => true, 'full_base' => true),
                                array('escape' => false)
                            ),
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

    public function api_add()
    {

        $this->Device->create();
        $this->_attachments('Device');

        $save_data = $this->request->data;
        $save_data['Device']['user_id'] = $this->Auth->user('id');
        $save_data['Device']['submitted'] = 2;
        //lucian
        if (empty($save_data['Device']['reference_no'])) {
            $count = $this->Device->find('count',  array(
                'fields' => 'Device.reference_no',
                'conditions' => array(
                    'Device.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Device.reference_no !=' => 'new'
                )
            ));
            $count++;
            $count = ($count < 10) ? "0$count" : $count;
            $save_data['Device']['reference_no'] = 'MD/' . date('Y') . '/' . $count;
        }
        // $save_data['Device']['report_type'] = 'Initial';
        //bokelo

        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = 'first';
            if ($this->Device->saveAssociated($save_data, array('validate' => $validate, 'deep' => true))) {

                $device = $this->Device->read(null, $this->Device->id);
                $id = $this->Device->id;

                //******************       Send Email and Notifications to Applicant and Managers          *****************************
                $this->loadModel('Message');
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_device_submit')));
                $variables = array(
                    'name' => $this->Auth->User('name'), 'reference_no' => $device['Device']['reference_no'],
                    'reference_link' => $html->link(
                        $device['Device']['reference_no'],
                        array('controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'reporter' => true, 'full_base' => true),
                        array('escape' => false)
                    ),
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

                //Send SMS
                if (!empty($device['Device']['reporter_phone']) && strlen(substr($device['Device']['reporter_phone'], -9)) == 9 && is_numeric(substr($device['Device']['reporter_phone'], -9))) {
                    $datum['phone'] = '254' . substr($device['Device']['reporter_phone'], -9);
                    $variables['reference_url'] = Router::url(['controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'reporter' => true, 'full_base' => true]);
                    $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                    $this->QueuedTask->createJob('GenericSms', $datum);
                }

                //Notify managers
                $users = $this->Device->User->find('all', array(
                    'contain' => array(),
                    'conditions' => array('User.group_id' => 2)
                ));
                foreach ($users as $user) {
                    $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $device['Device']['reference_no'],
                        'reference_link' => $html->link(
                            $device['Device']['reference_no'],
                            array('controller' => 'devices', 'action' => 'view', $device['Device']['id'], 'manager' => true, 'full_base' => true),
                            array('escape' => false)
                        ),
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

                $this->set([
                    'status' => 'success',
                    'message' => 'The DEVICE has been submitted to PPB',
                    'device' => $device,
                    '_serialize' => ['status', 'message', 'device']
                ]);
            } else {
                $this->set([
                    'status' => 'failed',
                    'message' => 'The DEVICE could not be saved. Please review the error(s) and resubmit and try again.',
                    'validation' => $this->Device->validationErrors,
                    'device' => $this->request->data,
                    '_serialize' => ['status', 'message', 'validation', 'device']
                ]);
            }
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function manager_copy($id = null)
    {
        if ($this->request->is('post')) {
            $this->Device->id = $id;
            if (!$this->Device->exists()) {
                throw new NotFoundException(__('Invalid DEVICE'));
            }
            $device = Hash::remove($this->Device->find(
                'first',
                array(
                    'contain' => array('ListOfDevice'),
                    'conditions' => array('Device.id' => $id)
                )
            ), 'Device.id');

            $device = Hash::remove($device, 'ListOfDevice.{n}.id');
            $data_save = $device['Device'];
            // $data_save['ListOfDevice'] = $device['ListOfDevice'];
            if (isset($device['ListOfDevice'])) $data_save['ListOfDevice'] = $device['ListOfDevice'];
            $data_save['device_id'] = $id;
            $data_save['user_id'] = $this->Auth->User('id');;
            $this->Device->saveField('copied', 1);
            $data_save['copied'] = 2;

            if ($this->Device->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                $this->Session->setFlash(__('Clean copy of ' . $data_save['reference_no'] . ' has been created'), 'alerts/flash_info');
                $this->redirect(array('action' => 'edit', $this->Device->id));
            } else {
                $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

    public function manager_edit($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid DEVICE'));
        }
        $device = $this->Device->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';
            }
            if ($this->Device->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Device->saveField('submitted', 2);
                    $this->Device->saveField('submitted_date', date("Y-m-d H:i:s"));
                    $device = $this->Device->read(null, $id);

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

        //Manager will always edit a copied report
        $device = $this->Device->find('first', array(
            'conditions' => array('Device.id' => $device['Device']['device_id']),
            'contain' => array('ListOfDevice', 'County', 'Attachment', 'Designation', 'ExternalComment')
        ));
        $this->set('device', $device);

        $counties = $this->Device->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Device->Designation->find('list');
        $this->set(compact('designations'));
    }

    public function admin_edit($id = null)
    {
        $this->set('title_for_layout', 'Edit Device ' . $id);
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
            if ($this->Auth->user('id')) {
                $this->request->data['Device']['user_id'] = $this->Auth->user('id');
            }
            // pr($this->data);
            if ($this->Device->saveAssociated($this->request->data, array('validate' => $validate))) {
                if (!$this->request->is('ajax')) {
                    $this->Session->setFlash(__('You have successfully saved the report'), 'flash_success');
                    $this->redirect(array('action' => 'edit', $this->Device->Luhn($this->Device->id)));
                } else {
                    $this->set('message', 'phwesk!! finally some progress' . $id);
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
        $designations = $this->Device->Designation->find('list');
        $this->set(compact('designations'));
    }
    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
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

    public function admin_archive($id = null)
    {
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

    public function createDevice()
    {
        if ($this->Auth->User('id')) {
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

    // function to delete a report
    public function reporter_delete($id = null)
    {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid report'));
        }
        $this->request->onlyAllow('post', 'delete');
        //read the report
        $report = $this->Device->read(null, $id);
        //update the report status to deleted
        $report['Device']['deleted'] = true;
        $report['Device']['deleted_date'] = date('Y-m-d H:i:s');
        //save the report withouth validation
        if ($this->Device->save($report, array('validate' => false, 'deep' => true))) {
            $this->Session->setFlash(__('The report has been deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The report could not be deleted. Please, try again.'), 'flash_error');
            $this->redirect(array('action' => 'index'));
        }
    }
}
