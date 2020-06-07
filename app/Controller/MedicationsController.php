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
    public $presetVars = array();

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
/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Medication->recursive = 0;
		$this->set('medications', $this->Paginator->paginate());
	}*/
    public function reporter_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Medication->parseCriteria($this->passedArgs);
        $criteria['Medication.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Medication.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sae->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $this->set('medications', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		$options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
		$this->set('medication', $this->Medication->find('first', $options));
	}

    public function reporter_view($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            $this->Session->setFlash(__('Could not verify the MEDICATION report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id,  'orientation' => 'portrait');
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

        $medication = $this->Medication->read(null);
        $this->set('medication', $medication);
        // $this->render('pdf/view');

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'MEDICATION_' . $id,  'orientation' => 'portrait');
            $this->response->download('MEDICATION_'.$medication['Medication']['id'].'.pdf');
        }
    }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medication->create();
			if ($this->Medication->save($this->request->data)) {
				$this->Flash->success(__('The medication has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->Medication->id));
			} else {
				$this->Flash->error(__('The medication could not be saved. Please, try again.'));
			}
		}
		$users = $this->Medication->User->find('list');
		$counties = $this->Medication->County->find('list');
		$designations = $this->Medication->Designation->find('list');
		$this->set(compact('users', 'counties', 'designations'));
	}

	public function reporter_add() {        
        $count = $this->Medication->find('count',  array('conditions' => array(
            'Medication.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $this->Medication->create();
        $this->Medication->save(['Medication' => ['user_id' => $this->Auth->User('id'),  
            'reference_no' => 'ME/'.date('Y').'/'.$count,
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
	public function edit($id = null) {
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medication->saveAssociated($this->request->data)) {
				$this->Flash->success(__('The medication has been saved.'));
				return $this->redirect(array('action' => 'view', $this->Medication->id));
			} else {
				$this->Flash->error(__('The medication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
			$this->request->data = $this->Medication->find('first', $options);
		}
		$users = $this->Medication->User->find('list');
		$counties = $this->Medication->County->find('list');
		$designations = $this->Medication->Designation->find('list');
		$this->set(compact('users', 'counties', 'designations'));
	}

	public function reporter_edit($id = null) { 
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            throw new NotFoundException(__('Invalid MEDICATION'));
        }
        $medication = $this->Medication->read(null, $id);
        if ($medication['Medication']['submitted'] > 1) {
                $this->Session->setFlash(__('The sae has been submitted'), 'alerts/flash_info');
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
                        'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'saes', 'action' => 'view', $medication['Medication']['id'], 'manager' => true, 'full_base' => true), 
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

                    $this->Session->setFlash(__('The MEDICATION has been submitted to PPB'), 'alerts/flash_success');
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
