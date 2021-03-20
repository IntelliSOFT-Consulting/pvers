<?php
App::uses('AppController', 'Controller');
/**
 * MedicationProducts Controller
 *
 * @property MedicationProduct $MedicationProduct
 * @property PaginatorComponent $Paginator
 */
class MedicationProductsController extends AppController {

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
		$this->MedicationProduct->recursive = 0;
		$this->set('medicationProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MedicationProduct->exists($id)) {
			throw new NotFoundException(__('Invalid medication product'));
		}
		$options = array('conditions' => array('MedicationProduct.' . $this->MedicationProduct->primaryKey => $id));
		$this->set('medicationProduct', $this->MedicationProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MedicationProduct->create();
			if ($this->MedicationProduct->save($this->request->data)) {
				$this->Flash->success(__('The medication product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The medication product could not be saved. Please, try again.'));
			}
		}
		$medications = $this->MedicationProduct->Medication->find('list');
		$this->set(compact('medications'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MedicationProduct->exists($id)) {
			throw new NotFoundException(__('Invalid medication product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MedicationProduct->save($this->request->data)) {
				$this->Flash->success(__('The medication product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The medication product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MedicationProduct.' . $this->MedicationProduct->primaryKey => $id));
			$this->request->data = $this->MedicationProduct->find('first', $options);
		}
		$medications = $this->MedicationProduct->Medication->find('list');
		$this->set(compact('medications'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->MedicationProduct->exists($id)) {
			throw new NotFoundException(__('Invalid medication product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MedicationProduct->delete($id)) {
			$message = ['status' => 'Success'];
			$this->set('_serialize', array('message'));
			// $this->Flash->success(__('The medication product has been deleted.'));
		} else {
			$message = ['status' => 'Success'];
			$this->set('_serialize', array('message'));
			// $this->Flash->error(__('The medication product could not be deleted. Please, try again.'));
		}
		// return $this->redirect(array('action' => 'index'));
	}
}
