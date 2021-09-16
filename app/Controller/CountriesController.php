<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 */
class CountriesController extends AppController {


	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
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
		$this->Country->recursive = -1;
		$this->set('countries', $this->Country->find('list'));
	}

	public function api_index() {
		$this->Country->recursive = -1;
		$this->set('countries', $this->Country->find('list', array('order' => array('Country.name' => 'asc'))));
		$this->set('_serialize', array('countries'));
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Country->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->Country->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Country.name' => 'asc');
		$this->set('countries', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Country->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Country->read(null, $id);
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->Country->delete()) {
			$this->Session->setFlash(__('Country deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Country was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->Country->delete()) {
			$this->Session->setFlash(__('Country deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Country was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
