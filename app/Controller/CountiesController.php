<?php
App::uses('AppController', 'Controller');
/**
 * Counties Controller
 *
 * @property County $County
 */
class CountiesController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'county_name', 'type' => 'value'),
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
		$this->County->recursive = -1;
		$this->set('counties', $this->County->find('list', array('order' => array('County.county_name' => 'asc'))));
	}

	public function api_index() {
		$this->County->recursive = -1;
		$this->set('counties', $this->County->find('list', array('order' => array('County.county_name' => 'asc'))));
		$this->set('_serialize', array('counties'));
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->County->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->County->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('County.county_name' => 'asc');
		$this->set('counties', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->County->id = $id;
		if (!$this->County->exists()) {
			throw new NotFoundException(__('Invalid county'));
		}
		$this->set('county', $this->County->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->County->create();
			if ($this->County->save($this->request->data)) {
				$this->Session->setFlash(__('The county has been saved'));
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The county could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->County->create();
			if ($this->County->save($this->request->data)) {
				$this->Session->setFlash(__('The new county has been added'), 'flash_success');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The county could not be saved. Please, try again.'));
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
		$this->County->id = $id;
		if (!$this->County->exists()) {
			throw new NotFoundException(__('Invalid county'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->County->save($this->request->data)) {
				$this->Session->setFlash(__('The county has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The county could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->County->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->County->id = $id;
		if (!$this->County->exists()) {
			throw new NotFoundException(__('Invalid county'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->County->save($this->request->data)) {
				$this->Session->setFlash(__('The county has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The county could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->County->read(null, $id);
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
		$this->County->id = $id;
		if (!$this->County->exists()) {
			throw new NotFoundException(__('Invalid county'));
		}
		if ($this->County->delete()) {
			$this->Session->setFlash(__('County deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('County was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->County->id = $id;
		if (!$this->County->exists()) {
			throw new NotFoundException(__('Invalid county'));
		}
		if ($this->County->delete()) {
			$this->Session->setFlash(__('County deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('County was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
