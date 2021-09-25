<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('Security', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Padrs Controller
 *
 * @property Padr $Padr
 * @property PaginatorComponent $Paginator
 */
class PadrsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator');
    public $components = array(
            // 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
            'Search.Prg', 
            // 'Paginator'
            );
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');
    public $helpers = array('Tools.Captcha' => array('type' => 'active'));

	public function beforeFilter() {
		parent::beforeFilter();
		// remove initDb
		$this->Auth->allow('add', 'view', 'followup', 'edit');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Padr->recursive = 0;
		$this->set('padrs', $this->Paginator->paginate());
	}

    public function manager_index() {
        $this->Prg->commonProcess();
        // debug($this->request->query['pages']);
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (!empty($this->request->query['pages'])) $this->paginate['limit'] = $this->request->query['pages'];
            else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Padr->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Padr.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Padr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'limit' => 1000)
              ));
        }
        //end pdf export
        $this->set('page_options', $this->page_options);
        $counties = $this->Padr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Padr->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
        $this->set('padrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    /*public function api_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($this->page_options);


        $criteria = $this->Padr->parseCriteria($this->passedArgs);

        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Padr.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Padr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end csv export
        
        $this->set([
            'page_options', $this->page_options,
            'padrs' => Sanitize::clean($this->paginate(), array('encode' => false)),
            '_serialize' => ['padrs', 'page_options']]);
    }*/

    private function csv_export($cpadrs = ''){
        $this->response->download('PADRs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('cpadrs'));
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
    public function view($token = null) {
        $id = $this->Padr->field('id', array('token' => $token));
        if (!$this->Padr->exists($id)) {
            throw new NotFoundException(__('Invalid padr'));
            $this->Flash->error(__('We could not identify the report. Please refer to the acknowledgement email sent by PPB.'));
        }
        $options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
        $padr = $this->Padr->find('first', $options);
        $this->set('padr', $this->Padr->find('first', $options));

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('PADR_'.str_replace($padr['Padr']['reference_no'], '/', '_').'.pdf');
        }
    }

	public function manager_view($id = null) {
		$this->Padr->id = $id;
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid padr'));
			$this->Flash->error(__('We could not identify the report. Please refer to the acknowledgement email sent by PPB.'));
		}
		$options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
		$padr = $this->Padr->find('first', $options);
		$this->set('padr', $this->Padr->find('first', $options));

		if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'PADR_' . $id .'.pdf',  'orientation' => 'portrait');
            $this->response->download('PADR_'.str_replace($padr['Padr']['reference_no'], '/', '_').'.pdf');
        }
	}

    public function api_view($token = null) {
        $id = $this->Padr->field('id', array('token' => $token));
        if (!$this->Padr->exists($id)) {
            throw new NotFoundException(__('Invalid padr'));
        }
        $options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
        $padr = $this->Padr->find('first', $options);
        if (empty($padr)) {  //TODO: Confirm if the user_id is allowed to access
            $this->set([
                    'status' => 'failed',
                    'message' => 'Could not verify the PADR report ID. Please ensure the ID is correct.',
                    '_serialize' => ['status', 'message']
                ]);
        } else {

            $this->set([
                'status' => 'success', 
                'padr' => $padr, 
                '_serialize' => ['status', 'padr']]);
            
            if (strpos($this->request->url, 'pdf') !== false) {
                $this->pdfConfig = array('filename' => 'PADR_' . $id .'.pdf',  'orientation' => 'portrait');
                $this->response->download('PADR_'.str_replace($padr['Padr']['reference_no'], '/', '_').'.pdf');
            }
        }
        
    }

	public function followup($token = null) {
        if ($this->request->is('post')) {
        	$id = $this->Padr->field('id', array('token' => $token));
            $this->Padr->id = $id;
            if (!$this->Padr->exists()) {
                throw new NotFoundException(__('Invalid PADR'));
				$this->Flash->error(__('We could not identify the report. Please refer to the acknowledgement email sent by PPB.'));
            }
            $padr = Hash::remove($this->Padr->find('first', array(
                        'contain' => array('PadrListOfMedicine'),
                        'conditions' => array('Padr.id' => $id)
                        )
                    ), 'Padr.id');

            $padr = Hash::remove($padr, 'PadrListOfMedicine.{n}.id');
            $data_save = $padr['Padr'];
            if(isset($padr['PadrListOfMedicine'])) $data_save['PadrListOfMedicine'] = $padr['PadrListOfMedicine'];
            $data_save['padr_id'] = $id;

            $count = $this->Padr->find('count',  array('conditions' => array(
                        'Padr.reference_no LIKE' => $padr['Padr']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $padr['Padr']['reference_no'].'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Padr->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
            	$this->Padr->saveField('token', Security::hash($this->Padr->id));
            	$padr = $this->Padr->read();
                $this->Flash->success(__('Follow up '.$data_save['reference_no'].' has been created'));
                $this->redirect(array('action' => 'edit', $padr['Padr']['token']));               
            } else {
            	$this->Flash->error(__('The followup could not be saved. Please, try again.'));
                $this->redirect($this->referer());
            }
        }
    }
/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Padr->create();
            $this->Padr->Behaviors->attach('Tools.Captcha');
            // debug($this->request->data);
            if ($this->Padr->saveAssociated($this->request->data)) {
                $count = $this->Padr->find('count',  array('conditions' => array(
                    'Padr.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
                $count++;
                $count = ($count < 10) ? "0$count" : $count;
                $this->Padr->saveField('reference_no', 'PADR/'.date('Y').'/'.$count);
                $this->Padr->saveField('token', Security::hash($this->Padr->id));

                //******************       Send Emails to Reporter and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_padr_submit')));
                    $padr = $this->Padr->read();
                    $variables = array(
                      'name' => $padr['Padr']['reporter_name'], 'reference_no' => $padr['Padr']['reference_no'],
                      'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $padr['Padr']['modified']
                      );
                    $datum = array(
                        'email' => $padr['Padr']['reporter_email'],
                        'id' => $this->Padr->id,  'type' => 'reporter_padr_submit', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    
                    //Notify managers
                    $users = $this->Padr->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $padr['Padr']['reference_no'], 
                        'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $padr['Padr']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $this->Padr->id, 'user_id' => $user['User']['id'], 'type' => 'reporter_padr_submit', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                //**********************************    END   *********************************

                $this->Flash->success(__('Your report has been successfully submitted to PPB. Please check your email for the acknowldgement.'));
                return $this->redirect(array('action' => 'view', $padr['Padr']['token']));
            } else {
                $this->Flash->error(__('The report could not be created. Please, try again.'));
            }
        }
        
        $counties = $this->Padr->County->find('list', array('order' => array('County.county_name')));
        $this->set(compact('counties'));
    }

	public function api_add() {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Padr->create();
            $this->_attachments('Padr');

            // debug($this->request->data);
			if ($this->Padr->saveAssociated($this->request->data)) {
				$count = $this->Padr->find('count',  array('conditions' => array(
		            'Padr.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
		        $count++;
		        $count = ($count < 10) ? "0$count" : $count;
				$this->Padr->saveField('reference_no', 'PADR/'.date('Y').'/'.$count);
				$this->Padr->saveField('token', Security::hash($this->Padr->id));

				//******************       Send Emails to Reporter and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_padr_submit')));
                    $padr = $this->Padr->read();
                    $variables = array(
                      'name' => $padr['Padr']['reporter_name'], 'reference_no' => $padr['Padr']['reference_no'],
                      'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $padr['Padr']['modified']
                      );
                    $datum = array(
                        'email' => $padr['Padr']['reporter_email'],
                        'id' => $this->Padr->id,  'type' => 'reporter_padr_submit', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
					$this->QueuedTask->createJob('GenericEmail', $datum);
                    
                    //Notify managers
                    $users = $this->Padr->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $padr['Padr']['reference_no'], 
                        'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $padr['Padr']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $this->Padr->id, 'user_id' => $user['User']['id'], 'type' => 'reporter_padr_submit', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

					  $this->QueuedTask->createJob('GenericEmail', $datum);
					  $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                //**********************************    END   *********************************

				
                $this->set([
                    'status' => 'success',
                    'message' => 'The PADR has been submitted to PPB',
                    'padr' => $padr,
                    '_serialize' => ['status', 'message', 'padr']
                ]); 
			} else {
				$this->set([
                        'status' => 'failed',
                        'message' => 'The PADR could not be saved',
                        'validation' => $this->Padr->validationErrors,
                        'padr' => $this->request->data,
                        '_serialize' => ['status', 'message', 'validation', 'padr']
                    ]);  
			}
		} else {
            throw new MethodNotAllowedException();
        }	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void

	public function edit($id = null) {
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid report id'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Padr->save($this->request->data)) {
				$this->Flash->success(__('The report has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'edit', $this->Padr->id));
			} else {
				$this->Flash->error(__('The report could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
			$this->request->data = $this->Padr->find('first', $options);
		}
		$counties = $this->Padr->County->find('list');
		$this->set(compact('counties'));
	}
 */
	public function edit($token = null) {
		if ($this->request->is('post')) {
			$id = $this->Padr->field('id', array('token' => $token));
            $this->Padr->id = $id;
            if (!$this->Padr->exists()) {
                throw new NotFoundException(__('Invalid PADR'));
				$this->Flash->error(__('We could not identify the report. Please refer to the acknowledgement email sent by PPB.'));
            }
            $this->Padr->Behaviors->attach('Tools.Captcha');
			if ($this->Padr->saveAssociated($this->request->data)) {

				//******************       Send Emails to Reporter and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_padr_followup')));
                    $padr = $this->Padr->read();
                    $variables = array(
                      'name' => $padr['Padr']['reporter_name'], 'reference_no' => $padr['Padr']['reference_no'],
                      'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $padr['Padr']['modified']
                      );
                    $datum = array(
                        'email' => $padr['Padr']['reporter_email'],
                        'id' => $this->Padr->id,  'type' => 'reporter_padr_followup', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
					$this->QueuedTask->createJob('GenericEmail', $datum);
                    
                    //Notify managers
                    $users = $this->Padr->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $padr['Padr']['reference_no'], 
                        'reference_link' => $html->link($padr['Padr']['reference_no'], array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['token'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $padr['Padr']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $this->Padr->id, 'user_id' => $user['User']['id'], 'type' => 'reporter_padr_followup', 'model' => 'Padr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

					  $this->QueuedTask->createJob('GenericEmail', $datum);
					  $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                //**********************************    END   *********************************

				$this->Flash->success(__('Your follow up report has been successfully submitted to PPB. Please check your email for the acknowldgement.'));
				return $this->redirect(array('action' => 'view', $padr['Padr']['token']));
			} else {
				$this->Flash->error(__('The followup report could not be created. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Padr.token' => $token));
			$this->request->data = $this->Padr->find('first', $options);
		}
		
		$counties = $this->Padr->County->find('list', array('order' => array('County.county_name')));
		$this->set(compact('counties'));
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid padr'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Padr->delete($id)) {
			$this->Flash->success(__('The padr has been deleted.'));
		} else {
			$this->Flash->error(__('The padr could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
