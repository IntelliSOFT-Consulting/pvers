<?php
App::uses('AppController', 'Controller');
/**
 * Frequencies Controller
 *
 * @property Frequency $Frequency
 */
class FrequenciesController extends AppController {

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
		$this->Frequency->recursive = -1;
		$this->set('frequencies', $this->Frequency->find('list'));
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Frequency->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->Frequency->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Frequency.name' => 'asc');
		$this->set('frequencies', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Frequency->id = $id;
		if (!$this->Frequency->exists()) {
			throw new NotFoundException(__('Invalid frequency'));
		}
		$this->set('frequency', $this->Frequency->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Frequency->create();
			if ($this->Frequency->save($this->request->data)) {
				$this->Session->setFlash(__('The frequency has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The frequency could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Frequency->create();
			if ($this->Frequency->save($this->request->data)) {
				$this->Session->setFlash(__('The frequency has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The frequency could not be saved. Please, try again.'), 'flash_error');
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
		$this->Frequency->id = $id;
		if (!$this->Frequency->exists()) {
			throw new NotFoundException(__('Invalid frequency'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Frequency->save($this->request->data)) {
				$this->Session->setFlash(__('The frequency has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The frequency could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Frequency->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->Frequency->id = $id;
		if (!$this->Frequency->exists()) {
			throw new NotFoundException(__('Invalid frequency'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Frequency->save($this->request->data)) {
				$this->Session->setFlash(__('The frequency has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The frequency could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Frequency->read(null, $id);
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
		$this->Frequency->id = $id;
		if (!$this->Frequency->exists()) {
			throw new NotFoundException(__('Invalid frequency'));
		}
		if ($this->Frequency->delete()) {
			$this->Session->setFlash(__('Frequency deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Frequency was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Frequency->id = $id;
		if (!$this->Frequency->exists()) {
			throw new NotFoundException(__('Invalid frequency'));
		}
		if ($this->Frequency->delete()) {
			$this->Session->setFlash(__('Frequency deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Frequency was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
