<?php
App::uses('AppController', 'Controller');
/**
 * SadrListOfDrugs Controller
 *
 * @property SadrListOfDrug $SadrListOfDrug
 */
class SadrListOfDrugsController extends AppController {
	
	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('delete');
	}

	/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SadrListOfDrug->recursive = 0;
		$this->set('sadrListOfDrugs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SadrListOfDrug->id = $id;
		if (!$this->SadrListOfDrug->exists()) {
			throw new NotFoundException(__('Invalid sadr list of drug'));
		}
		$this->set('sadrListOfDrug', $this->SadrListOfDrug->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SadrListOfDrug->create();
			if ($this->SadrListOfDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The sadr list of drug has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sadr list of drug could not be saved. Please, try again.'));
			}
		}
		$sadrs = $this->SadrListOfDrug->Sadr->find('list');
		$this->set(compact('sadrs'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SadrListOfDrug->id = $id;
		if (!$this->SadrListOfDrug->exists()) {
			throw new NotFoundException(__('Invalid sadr list of drug'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SadrListOfDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The sadr list of drug has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sadr list of drug could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SadrListOfDrug->read(null, $id);
		}
		$sadrs = $this->SadrListOfDrug->Sadr->find('list');
		$this->set(compact('sadrs'));
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
		if($id) {
			$this->SadrListOfDrug->id = $this->SadrListOfDrug->Luhn_Verify($id);
		} else {
			$this->SadrListOfDrug->id = $this->SadrListOfDrug->Luhn_Verify($this->data['id']);		
		}
		if (!$this->SadrListOfDrug->exists()) {
			throw new NotFoundException(__('Invalid sadr list of drug'));
		}
		if ($this->SadrListOfDrug->delete()) {
			if (!$this->request->is('ajax')) {
				$this->Session->setFlash(__('Sadr list of drug deleted'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->set('message', 'phwesk!! finally some progress');
				$this->set('_serialize', 'message');
			}
		} else {
			$this->Session->setFlash(__('Sadr list of drug was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}
}
