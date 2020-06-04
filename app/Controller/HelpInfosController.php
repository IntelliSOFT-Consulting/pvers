<?php
App::uses('AppController', 'Controller');
/**
 * HelpInfos Controller
 *
 * @property HelpInfo $HelpInfo
 */
class HelpInfosController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'field_name', 'type' => 'value'),
        array('field' => 'field_label', 'type' => 'value'),
        array('field' => 'title', 'type' => 'value'),
        array('field' => 'content', 'type' => 'value'),
        array('field' => 'help_text', 'type' => 'value'),
        array('field' => 'type', 'type' => 'value'),
        array('field' => 'id', 'type' => 'value'),
    );
		
	public function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('index', 'add', 'edit', 'view', 'delete');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->HelpInfo->recursive = 0;
		$this->set('helpInfos', $this->paginate());
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->HelpInfo->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->HelpInfo->recursive = -1;
        $this->paginate['limit'] = 20;
		$this->set('helpInfos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->HelpInfo->id = $id;
		if (!$this->HelpInfo->exists()) {
			throw new NotFoundException(__('Invalid help info'));
		}
		$this->set('helpInfo', $this->HelpInfo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HelpInfo->create();
			if ($this->HelpInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The help info has been saved'));
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The help info could not be saved. Please, try again.'));
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
		$this->HelpInfo->id = $id;
		if (!$this->HelpInfo->exists()) {
			throw new NotFoundException(__('Invalid help info'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HelpInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The help info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The help info could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->HelpInfo->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->HelpInfo->id = $id;
		if (!$this->HelpInfo->exists()) {
			throw new NotFoundException(__('Invalid help info'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HelpInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The Content has been updated'), 'flash_success');
				$this->redirect(array('action' => 'index', 'admin' => true));
			} else {
				$this->Session->setFlash(__('The help info could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->HelpInfo->read(null, $id);
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
		$this->HelpInfo->id = $id;
		if (!$this->HelpInfo->exists()) {
			throw new NotFoundException(__('Invalid help info'));
		}
		if ($this->HelpInfo->delete()) {
			$this->Session->setFlash(__('Help info deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Help info was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
