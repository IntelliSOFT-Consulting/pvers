<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {

    public $uses = array('Message', 'Sadr', 'SadrFollowup', 'Pqmp');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			$this->request->data['Message']['sent'] = 2;
			$count_sadrs = $count_pqmps = $count_sadr_followups = 0;
			$count_sadrs = $this->Sadr->find('count', array('conditions' => array('Sadr.reporter_email' => $this->request->data['Message']['receiver'])));
			$count_pqmps = $this->Pqmp->find('count', array('conditions' => array('Pqmp.reporter_email' => $this->request->data['Message']['receiver'])));
			$count_sadr_followups = $this->SadrFollowup->find('count', array('conditions' => array('SadrFollowup.reporter_email' => $this->request->data['Message']['receiver'])));;
			if($count_sadrs + $count_pqmps + $count_sadr_followups > 0) {
				if ($this->Message->save($this->request->data)) {
					$this->Session->setFlash(__('The email address has been confirmed. You will get a table of all the reports you sent us shortly.'), 'flash_success');
					$this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('There was no report that matched the email address ('.$this->request->data['Message']['receiver'].'). Please
											 enter the email address that you used to send reports.'), 'flash_error');
				$this->redirect($this->referer());
			}
		}
	}
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The email has successfully been added to the queue and will be sent.'), 'flash_success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
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
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
		}
		$sadrs = $this->Message->Sadr->find('list');
		$pqmps = $this->Message->Pqmp->find('list');
		$sadrFollowups = $this->Message->SadrFollowup->find('list');
		$this->set(compact('sadrs', 'pqmps', 'sadrFollowups'));
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
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('Message deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Message was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
