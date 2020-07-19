<?php
App::uses('AppController', 'Controller');
/**
 * SadrListOfMedicines Controller
 *
 * @property SadrListOfMedicine $SadrListOfMedicine
 * @property PaginatorComponent $Paginator
 */
class SadrListOfMedicinesController extends AppController {

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
		$this->SadrListOfMedicine->recursive = 0;
		$this->set('sadrListOfMedicines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid sadr list of medicine'));
		}
		$options = array('conditions' => array('SadrListOfMedicine.' . $this->SadrListOfMedicine->primaryKey => $id));
		$this->set('sadrListOfMedicine', $this->SadrListOfMedicine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SadrListOfMedicine->create();
			if ($this->SadrListOfMedicine->save($this->request->data)) {
				$this->Flash->success(__('The sadr list of medicine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sadr list of medicine could not be saved. Please, try again.'));
			}
		}
		$sadrs = $this->SadrListOfMedicine->Sadr->find('list');
		$sadrFollowups = $this->SadrListOfMedicine->SadrFollowup->find('list');
		$doses = $this->SadrListOfMedicine->Dose->find('list');
		$routes = $this->SadrListOfMedicine->Route->find('list');
		$frequencies = $this->SadrListOfMedicine->Frequency->find('list');
		$this->set(compact('sadrs', 'sadrFollowups', 'doses', 'routes', 'frequencies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid sadr list of medicine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SadrListOfMedicine->save($this->request->data)) {
				$this->Flash->success(__('The sadr list of medicine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sadr list of medicine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SadrListOfMedicine.' . $this->SadrListOfMedicine->primaryKey => $id));
			$this->request->data = $this->SadrListOfMedicine->find('first', $options);
		}
		$sadrs = $this->SadrListOfMedicine->Sadr->find('list');
		$sadrFollowups = $this->SadrListOfMedicine->SadrFollowup->find('list');
		$doses = $this->SadrListOfMedicine->Dose->find('list');
		$routes = $this->SadrListOfMedicine->Route->find('list');
		$frequencies = $this->SadrListOfMedicine->Frequency->find('list');
		$this->set(compact('sadrs', 'sadrFollowups', 'doses', 'routes', 'frequencies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->SadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid sadr list of medicine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SadrListOfMedicine->delete($id)) {
			$message = ['status' => 'Success'];
			$this->set('_serialize', array('message'));
			// $this->Flash->success(__('The sadr list of medicine has been deleted.'));
		} else {
			$message = ['status' => 'Failure'];
			$this->set('_serialize', array('message'));
			// $this->Flash->error(__('The sadr list of medicine could not be deleted. Please, try again.'));
		}
		// return $this->redirect(array('action' => 'index'));
	}
}
