<?php
App::uses('AppController', 'Controller');
/**
 * Doses Controller
 *
 * @property Dose $Dose
 */
class DosesController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'value', 'type' => 'value'),
        array('field' => 'name', 'type' => 'value'),
    );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'api_index');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dose->recursive = -1;
		$this->set('doses', $this->Dose->find('list'));
	}

	public function api_index() {
		$this->Dose->recursive = -1;
		$this->set('doses', $this->Dose->find('list', array('order' => array('Dose.name' => 'asc'))));
		$this->set('_serialize', array('doses'));
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Dose->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->Dose->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Dose.name' => 'asc');
		$this->set('doses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Dose->id = $id;
		if (!$this->Dose->exists()) {
			throw new NotFoundException(__('Invalid dose'));
		}
		$this->set('dose', $this->Dose->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dose->create();
			if ($this->Dose->save($this->request->data)) {
				$this->Session->setFlash(__('The dose has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dose could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Dose->create();
			if ($this->Dose->save($this->request->data)) {
				$this->Session->setFlash(__('The dose has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dose could not be saved. Please, try again.'), 'flash_error');
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
		$this->Dose->id = $id;
		if (!$this->Dose->exists()) {
			throw new NotFoundException(__('Invalid dose'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Dose->save($this->request->data)) {
				$this->Session->setFlash(__('The dose has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dose could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Dose->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->Dose->id = $id;
		if (!$this->Dose->exists()) {
			throw new NotFoundException(__('Invalid dose'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Dose->save($this->request->data)) {
				$this->Session->setFlash(__('The dose has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dose could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Dose->read(null, $id);
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
		$this->Dose->id = $id;
		if (!$this->Dose->exists()) {
			throw new NotFoundException(__('Invalid dose'));
		}
		if ($this->Dose->delete()) {
			$this->Session->setFlash(__('Dose deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Dose was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Dose->id = $id;
		if (!$this->Dose->exists()) {
			throw new NotFoundException(__('Invalid dose'));
		}
		if ($this->Dose->delete()) {
			$this->Session->setFlash(__('Dose deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Dose was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
