<?php
App::uses('AppController', 'Controller');
/**
 * PadrListOfMedicines Controller
 *
 * @property PadrListOfMedicine $PadrListOfMedicine
 * @property PaginatorComponent $Paginator
 */
class PadrListOfMedicinesController extends AppController {

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
		$this->PadrListOfMedicine->recursive = 0;
		$this->set('padrListOfMedicines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid padr list of medicine'));
		}
		$options = array('conditions' => array('PadrListOfMedicine.' . $this->PadrListOfMedicine->primaryKey => $id));
		$this->set('padrListOfMedicine', $this->PadrListOfMedicine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PadrListOfMedicine->create();
			if ($this->PadrListOfMedicine->save($this->request->data)) {
				$this->Flash->success(__('The padr list of medicine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The padr list of medicine could not be saved. Please, try again.'));
			}
		}
		$padrs = $this->PadrListOfMedicine->Padr->find('list');
		$this->set(compact('padrs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid padr list of medicine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PadrListOfMedicine->save($this->request->data)) {
				$this->Flash->success(__('The padr list of medicine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The padr list of medicine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PadrListOfMedicine.' . $this->PadrListOfMedicine->primaryKey => $id));
			$this->request->data = $this->PadrListOfMedicine->find('first', $options);
		}
		$padrs = $this->PadrListOfMedicine->Padr->find('list');
		$this->set(compact('padrs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->PadrListOfMedicine->exists($id)) {
			throw new NotFoundException(__('Invalid padr list of medicine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PadrListOfMedicine->delete($id)) {
			$this->Flash->success(__('The padr list of medicine has been deleted.'));
		} else {
			$this->Flash->error(__('The padr list of medicine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
