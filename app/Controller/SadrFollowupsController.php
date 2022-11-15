<?php
App::uses('AppController', 'Controller');
/**
 * SadrFollowups Controller
 *
 * @property SadrFollowup $SadrFollowup
 */
class SadrFollowupsController extends AppController {
	public $components = array('Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 'Search.Prg');
    public $uses = array('SadrFollowup', 'Sadr', 'Attachment');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'description_of_reaction', 'type' => 'value'),
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'device', 'type' => 'value'),
        array('field' => 'sadr_id', 'type' => 'value'),
        array('field' => 'start_date', 'type' => 'value'),
        array('field' => 'end_date', 'type' => 'value'),
    );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'edit','view', 'index', 'download', 'find', 'sadrIndex');
		$this->Security->blackHoleCallback = 'blackhole';
		if ($this->RequestHandler->isXml() || $this->RequestHandler->isAjax() || $this->request->params['action'] == 'edit')  $this->Security->csrfCheck = false;
	}

	public function blackhole($type) {
		$this->Session->setFlash(__('Sorry! The page has expired due to a '.$type.' error. Please refresh the page.'), 'flash_error');
		$this->redirect($this->referer());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SadrFollowup->recursive = 0;
		$this->set('SadrFollowups', $this->paginate());
	}

    public function admin_index() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		if (isset($this->passedArgs['id']) && $this->SadrFollowup->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->SadrFollowup->Luhn_Verify($this->passedArgs['id']);
		if (isset($this->passedArgs['sadr_id']) && $this->SadrFollowup->Luhn_Verify($this->passedArgs['sadr_id'])) $this->passedArgs['sadr_id'] = $this->SadrFollowup->Luhn_Verify($this->passedArgs['sadr_id']);
		$criteria = $this->SadrFollowup->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('SadrFollowup.created' => 'desc');
 		$this->SadrFollowup->recursive = -1;

		if (strpos($this->request->url,'xls') !== false){
			$this->helpers[] = 'PhpExcel';
			$this->SadrFollowup->recursive = 1;
			$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
			$this->set(compact('routes'));
			$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
			$this->set(compact('frequency'));
			$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
			$this->set(compact('dose'));
		}
		if ($this->RequestHandler->isXml()) {
			$this->SadrFollowup->recursive = 1;
			$this->response->download('SADRFOLLOWUPS_'.date('Y_m_d_His'));
		}
		$this->set('SadrFollowups', $this->paginate());
    }

	public function sadrIndex($id = null) {
        $this->set('title_for_layout', 'Sadr Follow Up lists ');
		$this->Sadr->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the SADR ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('controller'=>'sadrs', 'action'=>'add'));
		} else {
			$this->Sadr->recursive = -1;
			$this->set('submitted', $this->Sadr->read(array('id', 'submitted')));
		}
		$this->paginate = array(
			'fields' => array('SadrFollowup.id', 'SadrFollowup.created', 'SadrFollowup.description_of_reaction'),
			'conditions' => array('SadrFollowup.sadr_id' => $this->SadrFollowup->Luhn_Verify($id)),
			'limit' => 5
		);
		$this->SadrFollowup->recursive = -1;
		$this->set('SadrFollowups', $this->paginate('SadrFollowup'));
	}

	public function admin_sadrIndex($id = null) {
        $this->set('title_for_layout', 'Sadr Follow Up lists ');
		$this->Sadr->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the SADR ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('controller'=>'sadrs', 'action'=>'index'));
		} else {
			$this->Sadr->recursive = -1;
			$this->set('submitted', $this->Sadr->read(array('id', 'submitted')));
		}
		$this->paginate = array(
			'fields' => array('SadrFollowup.id', 'SadrFollowup.created', 'SadrFollowup.description_of_reaction'),
			'conditions' => array('SadrFollowup.sadr_id' => $this->SadrFollowup->Luhn_Verify($id)),
			'limit' => 50
		);
		$this->SadrFollowup->recursive = -1;
		$this->set('SadrFollowups', $this->paginate('SadrFollowup'));
	}


    public function followupIndex() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		if (isset($this->passedArgs['id']) && $this->SadrFollowup->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->SadrFollowup->Luhn_Verify($this->passedArgs['id']);
		$criteria = $this->SadrFollowup->parseCriteria($this->passedArgs);
		$criteria['SadrFollowup.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('SadrFollowup.created' => 'desc');
 		$this->SadrFollowup->recursive = -1;

		if (strpos($this->request->url,'xls') !== false){
			$this->helpers[] = 'PhpExcel';
			$this->SadrFollowup->recursive = 1;
			$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
			$this->set(compact('routes'));
			$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
			$this->set(compact('frequency'));
			$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
			$this->set(compact('dose'));
		}
		if ($this->RequestHandler->isXml()) {
			$this->SadrFollowup->recursive = 1;
			$this->response->download('SADRFOLLOWUPS_'.date('Y_m_d_His'));
		}
		$this->set('SadrFollowups', $this->paginate());
    }

/**
 * download method
 *
 * @param string $id
 * @return void
 */
	public function download($id = null) {
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the follow up suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		// $this->set('SadrFollowups', $this->SadrFollowup->read(null));
		$SadrFollowups = $this->SadrFollowup->read(null);
		$this->set('SadrFollowups', $SadrFollowups);
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->response->download('SadrFolloup_'.$SadrFollowups['SadrFollowup']['id']);
	}


/**
 * find method
 *
 * @param string $id
 * @return void
 */
	public function find() {
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($this->request->data['SadrFollowup']['search']);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the follow up suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'add'));
		} else {
			$this->redirect(array('action' => 'view', $this->request->data['SadrFollowup']['search']));
		}

	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		$this->set('sadrsFollowup', $this->SadrFollowup->read(null));
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		Configure::load('appwide');
		$this->set('root', Configure::read('Domain.root'));
	}

	public function admin_view($id = null) {
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		$this->set('sadrsFollowup', $this->SadrFollowup->read(null));
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		if ($this->RequestHandler->isXml()) {
			$this->response->download('SADRFOLLOWUP_'.date('Y_m_d_His'));
		}
	}

	public function admin_reply($id = null) {
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		Configure::load('appwide');
		$this->set('root', Configure::read('Domain.root'));
		$this->set('sadrsFollowup', $this->SadrFollowup->read(null));
		$this->SadrFollowup->saveField('submitted', 1);
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$response = array();
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->SadrFollowup->create();
			$this->SadrFollowup->set($this->request->data);
			$this->beforeSaving();
			if (strpos($this->request->url,'xml') !== false) {
				//XML REQUEST
				if ($this->SadrFollowup->saveAssociated($this->request->data)) {
					$response['message'] = 'Thank you for submitting the SADR Follow up report. A copy of the yellow form report has been sent to the email address you provided';
					$response['id'] = $this->SadrFollowup->Luhn($this->SadrFollowup->id);
					$this->set('message', $response);
				} else {
					$response['message'] = 'Sorry. We could not save your report. Please review the validation errors and resubmit.';
					$this->set('message', $response);
				}
				//XML REQUEST
			} else {
				if ($this->SadrFollowup->save($this->request->data)) {
					$this->Session->setFlash(__('The sadrs followup has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The sadrs followup could not be saved. Please, try again.'));
				}
			}
		}
		$users = $this->SadrFollowup->User->find('list');
		$counties = $this->SadrFollowup->County->find('list');
		$sadrs = $this->SadrFollowup->Sadr->find('list');
		$designations = $this->SadrFollowup->Designation->find('list');
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->set(compact('users', 'counties', 'sadrs', 'designations'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */

	public function edit($id = null) {
        $this->set('title_for_layout', 'Edit Sadrs Followup '.$id);
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('controller'=>'sadrs', 'action'=>'add'));
		} else {
			$sadrFollowup = $this->SadrFollowup->read(null);
			if ($sadrFollowup['SadrFollowup']['submitted'] > 1) {
				$this->Session->setFlash(__('The Report has been sent to PPB. You don\'t have permissions to edit it further.'), 'flash_error');
				$this->redirect(array('action' => 'view', $id));
			}
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data)) {
				if (isset($this->request->data['cancelReport'])) {
					$this->Session->setFlash(__('You have canceled a report'), 'flash_success');
					$this->redirect('/');
				}
				$this->beforeSaving();
				$validate = 'first';
				if (isset($this->request->data['submitReport'])) {	$validate = 'first';	}
				if($this->Auth->user('id')) {
					$this->request->data['SadrFollowup']['user_id'] = $this->Auth->user('id');
				}
				// pr($this->SadrFollowup->sadr_id);
				if(isset($this->request->data['Attachment']) && !empty($this->request->data['Attachment'])) {
					foreach($this->request->data['Attachment'] as $attachment) {
						$dataToSave[]['Attachment'] = $attachment;
					}
				}
				if (isset($dataToSave) && !$this->Attachment->saveAll($dataToSave, array('validate' => 'only'))) {
					$this->beforeDisplaying();
					$this->Session->setFlash(__('The attachments you provided are invalid. Please review the error and resubmit.'), 'flash_error');
				} else {
					if ($this->SadrFollowup->saveAssociated($this->request->data, array('validate' => $validate))) {
						if (!$this->request->is('ajax')) {
							if($validate == 'first') {
								$this->SadrFollowup->saveField('submitted', 2);
								$this->Session->setFlash(__('Your follow up report has been submitted to PPB. Thank you for your continued support.....'), 'flash_success');
								// $this->redirect(array('action' => 'view', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
								$this->redirect(array('action' => 'view', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
							} else {
								$this->Session->setFlash(__('The sadr Follow up report has been saved'), 'flash_success');
								$this->redirect(array('action' => 'view', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
							}
						} else {
							$this->set('message', 'phwesk!! finally some progress'.$id);
							$this->set('_serialize', 'message');
						}
					} else {
						$this->beforeDisplaying();
						$this->Session->setFlash(__('The Sadr Follow up report could not be saved. Please review the form and try again.'), 'flash_error');
					}
				}
			} else {
				$this->Session->setFlash(__('The Report could not be saved. Please ensure the file size is less than 5MB'), 'flash_error');
				$this->redirect(array('action' => 'edit', $id));
			}
		} else {
			$this->request->data = $this->SadrFollowup->read(null);
		}

		// $this->set('sadr', $this->Sadr->find('first', array('conditions'=> array('Sadr.id' => $sadrFollowup['SadrFollowup']['sadr_id']))));
		$this->set('attachments', $sadrFollowup['Attachment']);
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list',);
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
	}

	public function edit_old($id = null) {
		$this->SadrFollowup->id = $id;
		if (!$this->SadrFollowup->exists()) {
			throw new NotFoundException(__('Invalid sadrs followup'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SadrFollowup->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The sadrs followup has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sadrs followup could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SadrFollowup->read(null, $id);
		}
		$users = $this->SadrFollowup->User->find('list');
		$counties = $this->SadrFollowup->County->find('list');
		$sadrs = $this->SadrFollowup->Sadr->find('list');
		$designations = $this->SadrFollowup->Designation->find('list');
		$this->set(compact('users', 'counties', 'sadrs', 'designations'));
	}


	public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Edit Sadrs Followup '.$id);
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('controller'=>'sadrs', 'action'=>'add'));
		} else {
			$sadrFollowup = $this->SadrFollowup->read(null);
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data)) {
				if (isset($this->request->data['cancelReport'])) {
					$this->Session->setFlash(__('You have canceled a report'), 'flash_success');
					$this->redirect('/');
				}
				$this->beforeSaving();
				$validate = 'first';
				if (isset($this->request->data['submitReport'])) {	$validate = 'first';	}
				if($this->Auth->user('id')) {
					$this->request->data['SadrFollowup']['user_id'] = $this->Auth->user('id');
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
					if ($this->SadrFollowup->saveAssociated($this->request->data, array('validate' => $validate))) {
						if (!$this->request->is('ajax')) {
							if($validate == 'first') {
								$this->SadrFollowup->saveField('submitted', 2);
								$this->Session->setFlash(__('Your follow up report has been submitted to PPB. Thank you for your continued support.....'), 'flash_success');
								$this->redirect(array('action' => 'view', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
							} else {
								$this->Session->setFlash(__('The sadr Follow up report has been saved'), 'flash_success');
								$this->redirect(array('action' => 'view', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
							}
						} else {
							$this->set('message', 'phwesk!! finally some progress'.$id);
							$this->set('_serialize', 'message');
						}
					} else {
						$this->beforeDisplaying();
						$this->Session->setFlash(__('The Sadr Follow up report could not be saved. Please review the form and try again.'), 'flash_error');
					}
				}
			} else {
				$this->Session->setFlash(__('The Report could not be saved. Please ensure the file size is less than 5MB'), 'flash_error');
				$this->redirect(array('action' => 'edit', $id));
			}
		} else {
			$this->request->data = $this->SadrFollowup->read(null);
		}

		// $this->set('sadr', $this->Sadr->find('first', array('conditions'=> array('Sadr.id' => $sadrFollowup['SadrFollowup']['sadr_id']))));
		$this->set('attachments', $sadrFollowup['Attachment']);
		$routes = $this->SadrFollowup->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->SadrFollowup->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->SadrFollowup->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SadrFollowup->id = $id;
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		if ($this->SadrFollowup->delete()) {
			$this->Session->setFlash(__('Sadrs followup deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sadrs followup was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the Follow UP ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		if ($this->SadrFollowup->deactivate($this->SadrFollowup->id)) {
			$this->Session->setFlash(__('Sadrs followup deleted'), 'flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Sadrs followup was not deleted'));
		$this->redirect(array('action' => 'index'), 'flash_error');
	}

	public function admin_archive($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SadrFollowup->id = $this->SadrFollowup->Luhn_Verify($id);
		if (!$this->SadrFollowup->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->SadrFollowup->saveField('submitted', 6)) {
			$this->Session->setFlash(__('The report has been Archived. You can view it in the Archived List'), 'flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Sadr Followup was not Archived'));
		$this->redirect(array('action' => 'index'));
	}

}
