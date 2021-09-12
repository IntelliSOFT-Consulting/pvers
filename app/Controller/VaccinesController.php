<?php
App::uses('AppController', 'Controller');
/**
 * Vaccines Controller
 *
 * @property Vaccine $Vaccine
 * @property PaginatorComponent $Paginator
 */
class VaccinesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('api_index');
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Vaccine->recursive = 0;
		$this->set('vaccines', $this->Paginator->paginate());
	}

	public function api_index() {
		$this->Vaccine->recursive = -1;
		$this->set('vaccines', $this->Vaccine->find('list', array('order' => array('Vaccine.vaccine_name' => 'asc'))));
		$this->set('_serialize', array('vaccines'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Vaccine->exists($id)) {
			throw new NotFoundException(__('Invalid vaccine'));
		}
		$options = array('conditions' => array('Vaccine.' . $this->Vaccine->primaryKey => $id));
		$this->set('vaccine', $this->Vaccine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Vaccine->create();
			if ($this->Vaccine->save($this->request->data)) {
				$this->Flash->success(__('The vaccine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The vaccine could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Vaccine->exists($id)) {
			throw new NotFoundException(__('Invalid vaccine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vaccine->save($this->request->data)) {
				$this->Flash->success(__('The vaccine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The vaccine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vaccine.' . $this->Vaccine->primaryKey => $id));
			$this->request->data = $this->Vaccine->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Vaccine->exists($id)) {
			throw new NotFoundException(__('Invalid vaccine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vaccine->delete($id)) {
			$this->Flash->success(__('The vaccine has been deleted.'));
		} else {
			$this->Flash->error(__('The vaccine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
