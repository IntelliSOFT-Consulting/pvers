<?php
App::uses('AppController', 'Controller');
/**
 * ListOfDevices Controller
 *
 * @property ListOfDevice $ListOfDevice
 * @property PaginatorComponent $Paginator
 */
class ListOfDevicesController extends AppController {

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
		$this->ListOfDevice->recursive = 0;
		$this->set('listOfDevices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ListOfDevice->exists($id)) {
			throw new NotFoundException(__('Invalid list of device'));
		}
		$options = array('conditions' => array('ListOfDevice.' . $this->ListOfDevice->primaryKey => $id));
		$this->set('listOfDevice', $this->ListOfDevice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ListOfDevice->create();
			if ($this->ListOfDevice->save($this->request->data)) {
				$this->Flash->success(__('The list of device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list of device could not be saved. Please, try again.'));
			}
		}
		$devices = $this->ListOfDevice->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ListOfDevice->exists($id)) {
			throw new NotFoundException(__('Invalid list of device'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ListOfDevice->save($this->request->data)) {
				$this->Flash->success(__('The list of device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list of device could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ListOfDevice.' . $this->ListOfDevice->primaryKey => $id));
			$this->request->data = $this->ListOfDevice->find('first', $options);
		}
		$devices = $this->ListOfDevice->Device->find('list');
		$this->set(compact('devices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->ListOfDevice->exists($id)) {
			throw new NotFoundException(__('Invalid list of device'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ListOfDevice->delete($id)) {
			$message = ['status' => 'Success'];
			$this->set('_serialize', array('message'));
			// $this->Flash->success(__('The list of device has been deleted.'));
		} else {
			$message = ['status' => 'Failure'];
			$this->set('_serialize', array('message'));
			// $this->Flash->error(__('The list of device could not be deleted. Please, try again.'));
		}
		// return $this->redirect(array('action' => 'index'));
	}
}
