<?php
App::uses('AppController', 'Controller');
/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 */
class FeedbacksController extends AppController {
	
 	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'feedback', 'type' => 'value'),
        array('field' => 'start_date', 'type' => 'value'),
        array('field' => 'end_date', 'type' => 'value'),
    );
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Feedback->recursive = 0;
		$this->set('feedbacks', $this->paginate());
	}

    public function admin_index() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		$criteria = $this->Feedback->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Feedback.created' => 'desc');
 		$this->Feedback->recursive = -1;
	
		$this->set('feedbacks', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->set('feedback', $this->Feedback->read(null, $id));
	}

	public function admin_view($id = null) {
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->Feedback->recursive = -1;
		$this->set('feedback', $this->Feedback->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Feedback->create();
			if($this->Auth->user('id')) { 
				$this->request->data['Feedback']['user_id'] = $this->Auth->user('id');
			}
			if ($this->Feedback->save($this->request->data) && empty($this->data['Feedback']['bot_stop'])) {
				$this->Session->setFlash(__('We have successfully received your feedback. '), 'flash_success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$users = $this->Feedback->User->find('list');
		$sadrs = $this->Feedback->Sadr->find('list');
		$this->set(compact('users', 'sadrs'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Feedback->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Feedback->read(null, $id);
		}
		$users = $this->Feedback->User->find('list');
		$sadrs = $this->Feedback->Sadr->find('list');
		$this->set(compact('users', 'sadrs'));
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
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('Feedback deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('Feedback deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
