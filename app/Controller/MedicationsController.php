<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Medications Controller
 *
 * @property Medication $Medication
 * @property PaginatorComponent $Paginator
 */
class MedicationsController extends AppController {

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
		$this->Medication->recursive = 0;
		$this->set('medications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		$options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
		$this->set('medication', $this->Medication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medication->create();
			if ($this->Medication->save($this->request->data)) {
				$this->Flash->success(__('The medication has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->Medication->id));
			} else {
				$this->Flash->error(__('The medication could not be saved. Please, try again.'));
			}
		}
		$users = $this->Medication->User->find('list');
		$counties = $this->Medication->County->find('list');
		$designations = $this->Medication->Designation->find('list');
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
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medication->save($this->request->data)) {
				$this->Flash->success(__('The medication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The medication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
			$this->request->data = $this->Medication->find('first', $options);
		}
		$users = $this->Medication->User->find('list');
		$counties = $this->Medication->County->find('list');
		$designations = $this->Medication->Designation->find('list');
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
		if (!$this->Medication->exists($id)) {
			throw new NotFoundException(__('Invalid medication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medication->delete($id)) {
			$this->Flash->success(__('The medication has been deleted.'));
		} else {
			$this->Flash->error(__('The medication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
