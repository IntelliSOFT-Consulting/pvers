<?php
App::uses('AppController', 'Controller');
/**
 * SuspectedDrugs Controller
 *
 * @property SuspectedDrug $SuspectedDrug
 * @property PaginatorComponent $Paginator
 */
class SuspectedDrugsController extends AppController {

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
		$this->SuspectedDrug->recursive = 0;
		$this->set('suspectedDrugs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SuspectedDrug->exists($id)) {
			throw new NotFoundException(__('Invalid suspected drug'));
		}
		$options = array('conditions' => array('SuspectedDrug.' . $this->SuspectedDrug->primaryKey => $id));
		$this->set('suspectedDrug', $this->SuspectedDrug->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SuspectedDrug->create();
			if ($this->SuspectedDrug->save($this->request->data)) {
				$this->Flash->success(__('The suspected drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The suspected drug could not be saved. Please, try again.'));
			}
		}
		$saes = $this->SuspectedDrug->Sae->find('list');
		$routes = $this->SuspectedDrug->Route->find('list');
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
		if (!$this->SuspectedDrug->exists($id)) {
			throw new NotFoundException(__('Invalid suspected drug'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SuspectedDrug->save($this->request->data)) {
				$this->Flash->success(__('The suspected drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The suspected drug could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SuspectedDrug.' . $this->SuspectedDrug->primaryKey => $id));
			$this->request->data = $this->SuspectedDrug->find('first', $options);
		}
		$saes = $this->SuspectedDrug->Sae->find('list');
		$routes = $this->SuspectedDrug->Route->find('list');
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
		if (!$this->SuspectedDrug->exists($id)) {
			throw new NotFoundException(__('Invalid suspected drug'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SuspectedDrug->delete($id)) {
			$this->Flash->success(__('The suspected drug has been deleted.'));
		} else {
			$this->Flash->error(__('The suspected drug could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
