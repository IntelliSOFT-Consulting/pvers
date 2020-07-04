<?php
App::uses('AppController', 'Controller');
/**
 * ConcomittantDrugs Controller
 *
 * @property ConcomittantDrug $ConcomittantDrug
 * @property PaginatorComponent $Paginator
 */
class ConcomittantDrugsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ConcomittantDrug->recursive = 0;
		$this->set('concomittantDrugs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ConcomittantDrug->exists($id)) {
			throw new NotFoundException(__('Invalid concomittant drug'));
		}
		$options = array('conditions' => array('ConcomittantDrug.' . $this->ConcomittantDrug->primaryKey => $id));
		$this->set('concomittantDrug', $this->ConcomittantDrug->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ConcomittantDrug->create();
			if ($this->ConcomittantDrug->save($this->request->data)) {
				$this->Flash->success(__('The concomittant drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The concomittant drug could not be saved. Please, try again.'));
			}
		}
		$saes = $this->ConcomittantDrug->Sae->find('list');
		$routes = $this->ConcomittantDrug->Route->find('list');
		$this->set(compact('saes', 'routes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ConcomittantDrug->exists($id)) {
			throw new NotFoundException(__('Invalid concomittant drug'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ConcomittantDrug->save($this->request->data)) {
				$this->Flash->success(__('The concomittant drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The concomittant drug could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ConcomittantDrug.' . $this->ConcomittantDrug->primaryKey => $id));
			$this->request->data = $this->ConcomittantDrug->find('first', $options);
		}
		$saes = $this->ConcomittantDrug->Sae->find('list');
		$routes = $this->ConcomittantDrug->Route->find('list');
		$this->set(compact('saes', 'routes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->ConcomittantDrug->exists($id)) {
			throw new NotFoundException(__('Invalid concomittant drug'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ConcomittantDrug->delete($id)) {
			$this->Flash->success(__('The concomittant drug has been deleted.'));
		} else {
			$this->Flash->error(__('The concomittant drug could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
