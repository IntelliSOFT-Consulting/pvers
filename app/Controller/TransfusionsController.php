<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Transfusions Controller
 *
 * @property Transfusion $Transfusion
 * @property PaginatorComponent $Paginator
 */
class TransfusionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 'Search.Prg', 'RequestHandler');
    public $paginate = array();
    public $presetVars = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // add auth effectively to views
        $this->Auth->allow('index', 'add', 'edit','view', 'find', 'download');
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
		$this->Transfusion->recursive = 0;
		$this->set('transfusions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transfusion->exists($id)) {
			throw new NotFoundException(__('Invalid transfusion'));
		}
		$options = array('conditions' => array('Transfusion.' . $this->Transfusion->primaryKey => $id));
		$this->set('transfusion', $this->Transfusion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transfusion->create();
			if ($this->Transfusion->save($this->request->data)) {
				$this->Flash->success(__('The transfusion has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->Transfusion->id));
			} else {
				$this->Flash->error(__('The transfusion could not be saved. Please, try again.'));
			}
		}
		$users = $this->Transfusion->User->find('list');
		$counties = $this->Transfusion->County->find('list');
		$designations = $this->Transfusion->Designation->find('list');
		$this->set(compact('users', 'counties', 'designations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transfusion->exists($id)) {
			throw new NotFoundException(__('Invalid transfusion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transfusion->save($this->request->data)) {
				$this->Flash->success(__('The transfusion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The transfusion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transfusion.' . $this->Transfusion->primaryKey => $id));
			$this->request->data = $this->Transfusion->find('first', $options);
		}
		$users = $this->Transfusion->User->find('list');
		$counties = $this->Transfusion->County->find('list');
		$designations = $this->Transfusion->Designation->find('list');
		$this->set(compact('users', 'counties', 'designations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Transfusion->exists($id)) {
			throw new NotFoundException(__('Invalid transfusion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transfusion->delete($id)) {
			$this->Flash->success(__('The transfusion has been deleted.'));
		} else {
			$this->Flash->error(__('The transfusion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
