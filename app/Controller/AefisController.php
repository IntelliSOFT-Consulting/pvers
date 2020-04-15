<?php
App::uses('AppController', 'Controller');
/**
 * Aefis Controller
 *
 * @property Aefi $Aefi
 */
class AefisController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		// remove initDb
		$this->Auth->allow('add');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aefi->recursive = 0;
		$this->set('aefis', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Aefi->id = $id;
		if (!$this->Aefi->exists()) {
			throw new NotFoundException(__('Invalid aefi'));
		}
		$this->set('aefi', $this->Aefi->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aefi->create();
			if ($this->Aefi->save($this->request->data)) {
				$this->Session->setFlash(__('The aefi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aefi could not be saved. Please, try again.'));
			}
		}
		$users = $this->Aefi->User->find('list');
		$counties = $this->Aefi->County->find('list');
		$subCounties = $this->Aefi->SubCounty->find('list');
		$designations = $this->Aefi->Designation->find('list');
		$this->set(compact('users', 'counties', 'subCounties', 'designations'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Aefi->id = $id;
		if (!$this->Aefi->exists()) {
			throw new NotFoundException(__('Invalid aefi'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aefi->save($this->request->data)) {
				$this->Session->setFlash(__('The aefi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aefi could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aefi->read(null, $id);
		}
		$users = $this->Aefi->User->find('list');
		$counties = $this->Aefi->County->find('list');
		$subCounties = $this->Aefi->SubCounty->find('list');
		$designations = $this->Aefi->Designation->find('list');
		$this->set(compact('users', 'counties', 'subCounties', 'designations'));
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
		$this->Aefi->id = $id;
		if (!$this->Aefi->exists()) {
			throw new NotFoundException(__('Invalid aefi'));
		}
		if ($this->Aefi->delete()) {
			$this->Session->setFlash(__('Aefi deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aefi was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
