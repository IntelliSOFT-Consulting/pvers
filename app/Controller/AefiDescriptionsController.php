<?php
App::uses('AppController', 'Controller');
/**
 * AefiDescriptions Controller
 *
 * @property AefiDescription $AefiDescription
 * @property PaginatorComponent $Paginator
 */
class AefiDescriptionsController extends AppController {

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
		$this->AefiDescription->recursive = 0;
		$this->set('aefiDescriptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AefiDescription->exists($id)) {
			throw new NotFoundException(__('Invalid aefi description'));
		}
		$options = array('conditions' => array('AefiDescription.' . $this->AefiDescription->primaryKey => $id));
		$this->set('aefiDescription', $this->AefiDescription->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AefiDescription->create();
			if ($this->AefiDescription->save($this->request->data)) {
				$this->Flash->success(__('The aefi description has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The aefi description could not be saved. Please, try again.'));
			}
		}
		$aefis = $this->AefiDescription->Aefi->find('list');
		$this->set(compact('aefis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AefiDescription->exists($id)) {
			throw new NotFoundException(__('Invalid aefi description'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AefiDescription->save($this->request->data)) {
				$this->Flash->success(__('The aefi description has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The aefi description could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AefiDescription.' . $this->AefiDescription->primaryKey => $id));
			$this->request->data = $this->AefiDescription->find('first', $options);
		}
		$aefis = $this->AefiDescription->Aefi->find('list');
		$this->set(compact('aefis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->AefiDescription->exists($id)) {
			throw new NotFoundException(__('Invalid aefi description'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AefiDescription->delete($id)) {
			$this->Flash->success(__('The aefi description has been deleted.'));
		} else {
			$this->Flash->error(__('The aefi description could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
