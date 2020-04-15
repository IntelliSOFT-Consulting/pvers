<?php
App::uses('AppController', 'Controller');
/**
 * WhoDrugs Controller
 *
 * @property WhoDrug $WhoDrug
 */
class WhoDrugsController extends AppController {


	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'drug_name', 'type' => 'value'),
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->WhoDrug->recursive = 0;
		$this->set('whoDrugs', $this->paginate());
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->WhoDrug->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->WhoDrug->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('WhoDrug.drug_name' => 'asc');
		$this->set('whoDrugs', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		$this->set('whoDrug', $this->WhoDrug->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WhoDrug->create();
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WhoDrug->create();
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
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
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WhoDrug->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WhoDrug->read(null, $id);
		}
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
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->WhoDrug->delete()) {
			$this->Session->setFlash(__('Who drug deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Who drug was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->WhoDrug->delete()) {
			$this->Session->setFlash(__('Who drug deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Who drug was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
