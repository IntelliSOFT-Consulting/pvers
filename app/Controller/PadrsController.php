<?php
App::uses('AppController', 'Controller');
/**
 * Padrs Controller
 *
 * @property Padr $Padr
 * @property PaginatorComponent $Paginator
 */
class PadrsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public $helpers = array('Tools.Captcha' => array('type' => 'active'));

	public function beforeFilter() {
		parent::beforeFilter();
		// remove initDb
		$this->Auth->allow('add', 'view', 'edit');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Padr->recursive = 0;
		$this->set('padrs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid padr'));
		}
		$options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
		$this->set('padr', $this->Padr->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Padr->create();
            $this->Padr->Behaviors->attach('Tools.Captcha');
			if ($this->Padr->save($this->request->data)) {
				$this->Flash->success(__('The report has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->Padr->id));
			} else {
				$this->Flash->error(__('The report could not be saved. Please, try again.'));
			}
		}
		
		$counties = $this->Padr->County->find('list');
		$this->set(compact('counties'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid padr'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Padr->save($this->request->data)) {
				$this->Flash->success(__('The padr has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The padr could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Padr.' . $this->Padr->primaryKey => $id));
			$this->request->data = $this->Padr->find('first', $options);
		}
		$sadrs = $this->Padr->Sadr->find('list');
		$users = $this->Padr->User->find('list');
		$counties = $this->Padr->County->find('list');
		$subCounties = $this->Padr->SubCounty->find('list');
		$designations = $this->Padr->Designation->find('list');
		$vigiflows = $this->Padr->Vigiflow->find('list');
		$this->set(compact('sadrs', 'users', 'counties', 'subCounties', 'designations', 'vigiflows'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Padr->exists($id)) {
			throw new NotFoundException(__('Invalid padr'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Padr->delete($id)) {
			$this->Flash->success(__('The padr has been deleted.'));
		} else {
			$this->Flash->error(__('The padr could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
