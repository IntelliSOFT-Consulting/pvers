<?php
App::uses('AppController', 'Controller');
/**
 * Reminders Controller
 *
 * @property Reminder $Reminder
 * @property PaginatorComponent $Paginator
 */
class RemindersController extends AppController {

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
		$this->Reminder->recursive = 0;
		$this->set('reminders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
		$this->set('reminder', $this->Reminder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reminder->create();
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		}
		$users = $this->Reminder->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
			$this->request->data = $this->Reminder->find('first', $options);
		}
		$users = $this->Reminder->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reminder->delete($id)) {
			$this->Flash->success(__('The reminder has been deleted.'));
		} else {
			$this->Flash->error(__('The reminder could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
