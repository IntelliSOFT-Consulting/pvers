<?php
App::uses('AppController', 'Controller');
/**
 * Designations Controller
 *
 * @property Designation $Designation
 */
class DesignationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Designation->recursive = 0;
		$this->set('designations', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Designation->id = $id;
		if (!$this->Designation->exists()) {
			throw new NotFoundException(__('Invalid designation'));
		}
		$this->set('designation', $this->Designation->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Designation->create();
			if ($this->Designation->save($this->request->data)) {
				$this->Session->setFlash(__('The designation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The designation could not be saved. Please, try again.'));
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
		$this->Designation->id = $id;
		if (!$this->Designation->exists()) {
			throw new NotFoundException(__('Invalid designation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Designation->save($this->request->data)) {
				$this->Session->setFlash(__('The designation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The designation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Designation->read(null, $id);
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
		$this->Designation->id = $id;
		if (!$this->Designation->exists()) {
			throw new NotFoundException(__('Invalid designation'));
		}
		if ($this->Designation->delete()) {
			$this->Session->setFlash(__('Designation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Designation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
