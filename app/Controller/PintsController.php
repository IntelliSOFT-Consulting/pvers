<?php
App::uses('AppController', 'Controller');
/**
 * Pints Controller
 *
 * @property Pint $Pint
 * @property PaginatorComponent $Paginator
 */
class PintsController extends AppController {

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
		$this->Pint->recursive = 0;
		$this->set('pints', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pint->exists($id)) {
			throw new NotFoundException(__('Invalid pint'));
		}
		$options = array('conditions' => array('Pint.' . $this->Pint->primaryKey => $id));
		$this->set('pint', $this->Pint->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pint->create();
			if ($this->Pint->save($this->request->data)) {
				$this->Flash->success(__('The pint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pint could not be saved. Please, try again.'));
			}
		}
		$transfusions = $this->Pint->Transfusion->find('list');
		$this->set(compact('transfusions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pint->exists($id)) {
			throw new NotFoundException(__('Invalid pint'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pint->save($this->request->data)) {
				$this->Flash->success(__('The pint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pint could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pint.' . $this->Pint->primaryKey => $id));
			$this->request->data = $this->Pint->find('first', $options);
		}
		$transfusions = $this->Pint->Transfusion->find('list');
		$this->set(compact('transfusions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Pint->exists($id)) {
			throw new NotFoundException(__('Invalid pint'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pint->delete($id)) {
			$this->Flash->success(__('The pint has been deleted.'));
		} else {
			$this->Flash->error(__('The pint could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
