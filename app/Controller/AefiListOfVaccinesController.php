<?php
App::uses('AppController', 'Controller');
/**
 * AefiListOfVaccines Controller
 *
 * @property AefiListOfVaccine $AefiListOfVaccine
 * @property PaginatorComponent $Paginator
 */
class AefiListOfVaccinesController extends AppController {

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
		$this->AefiListOfVaccine->recursive = 0;
		$this->set('aefiListOfVaccines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AefiListOfVaccine->exists($id)) {
			throw new NotFoundException(__('Invalid aefi list of vaccine'));
		}
		$options = array('conditions' => array('AefiListOfVaccine.' . $this->AefiListOfVaccine->primaryKey => $id));
		$this->set('aefiListOfVaccine', $this->AefiListOfVaccine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AefiListOfVaccine->create();
			if ($this->AefiListOfVaccine->save($this->request->data)) {
				$this->Flash->success(__('The aefi list of vaccine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The aefi list of vaccine could not be saved. Please, try again.'));
			}
		}
		$aefis = $this->AefiListOfVaccine->Aefi->find('list');
		$saefis = $this->AefiListOfVaccine->Saefi->find('list');
		$this->set(compact('aefis', 'saefis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AefiListOfVaccine->exists($id)) {
			throw new NotFoundException(__('Invalid aefi list of vaccine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AefiListOfVaccine->save($this->request->data)) {
				$this->Flash->success(__('The aefi list of vaccine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The aefi list of vaccine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AefiListOfVaccine.' . $this->AefiListOfVaccine->primaryKey => $id));
			$this->request->data = $this->AefiListOfVaccine->find('first', $options);
		}
		$aefis = $this->AefiListOfVaccine->Aefi->find('list');
		$saefis = $this->AefiListOfVaccine->Saefi->find('list');
		$this->set(compact('aefis', 'saefis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->AefiListOfVaccine->exists($id)) {
			throw new NotFoundException(__('Invalid aefi list of vaccine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AefiListOfVaccine->delete($id)) {
			$this->Flash->success(__('The aefi list of vaccine has been deleted.'));
		} else {
			$this->Flash->error(__('The aefi list of vaccine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
