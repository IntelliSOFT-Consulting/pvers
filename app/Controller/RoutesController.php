<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 */
class RoutesController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'value', 'type' => 'value'),
        array('field' => 'name', 'type' => 'value'),
    );


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Route->recursive = -1;
		$this->set('routes', $this->Route->find('list'));
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Route->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->Route->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Route.name' => 'asc');
		$this->set('routes', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->set('route', $this->Route->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'), 'flash_error');
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Route->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Route->read(null, $id);
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('Route deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('Route deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
