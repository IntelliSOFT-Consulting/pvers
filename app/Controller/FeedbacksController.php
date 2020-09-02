<?php
App::uses('AppController', 'Controller');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 */
class FeedbacksController extends AppController {

	public $paginate = array('order' => array('Feedback.created' => 'desc'));
	// var $components = array('Captcha.Captcha'=>array('Model'=>'Feedback', 'field'=>'captcha'));//'Captcha.Captcha'
    public $presetVars = true; // using the model configuration
    public $components = array('Search.Prg');


    public $helpers = array('Tools.Captcha' => array('type' => 'active'));

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Feedback->recursive = 0;
		$this->set('feedbacks', $this->paginate());
	}


	public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Feedback->parseCriteria($this->passedArgs);
        $criteria[] = array('NOT' => array('Feedback.user_id' => null), 'Feedback.foreign_key' => null);
        $this->paginate['conditions'] = $criteria;

        $this->set('page_options', $page_options);
        $this->set('feedbacks', $this->paginate(), array('encode' => false));
    }

/**
 * view method
 *
 * @throws NotFoundException
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
		$this->set('feedback', $this->Feedback->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$previous_messages = array();
		if($this->Auth->User('id')) {
			// $this->helpers[] = 'Text';
			$this->request->data['Feedback']['user_id'] = $this->Auth->User('id');
			$this->Feedback->recursive = -1;
			$this->paginate['conditions'] = array('user_id' => $this->Auth->User('id'));
			$this->paginate['limit'] = 5;
			// $previous_messages = $this->Feedback->find('all', array('conditions' => array('id' => $this->Auth->User('id'))));
			$previous_messages = $this->paginate();

		}
		if ($this->request->is('post')) {
			$this->Feedback->create();
			// if($this->Auth->User('id')) $this->request->data['Feedback']['user_id'] = $this->Auth->User('id');
			$this->Feedback->Behaviors->attach('Tools.Captcha');
			if (empty($this->data['Feedback']['bot_stop']) && $this->Feedback->save($this->request->data)) {

				//******************       Send Email to Reporter and Managers and Notifications   reporter      *****************************
                  $this->loadModel('Message');
                  $message = $this->Message->find('first', array('conditions' => array('name' => 'contact_feedback')));

                  $users = $this->Feedback->User->find('all', array(
                      'contain' => array(),
                      'conditions' => array('OR' => array('User.id' => $this->Auth->User('id'), 'User.group_id' => array(2)))
                  ));
                  foreach ($users as $user) {
                      if($user['User']['group_id'] == 2) $actioner =  'manager';
                      if($user['User']['group_id'] == 3) $actioner =  'reporter';

                      $variables = array(
                        'name' => $user['User']['name'],  
                        'subject' => $this->request->data['Feedback']['subject'],
                        'feedback' => $this->request->data['Feedback']['feedback'],
                      );
                      $datum = array(
                        'email' => $user['User']['email'], 
                        'id' => $this->Auth->User('id'), 'user_id' => $user['User']['id'], 'type' => 'contact_feedback', 'model' => 'Feedback',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );
                      // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      // if($actioner == 'reporter') CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));

				// In your controller
				$this->loadModel('Queue.QueuedTask');
				$this->QueuedTask->createJob('GenericEmail', $datum);
				$this->QueuedTask->createJob('GenericNotification', $datum);

                  }
                //**********************************    END   *********************************
                  
				$this->Session->setFlash(__('The feedback has been saved'), 'alerts/flash_success');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('Your feedback could not be saved. Please, try again.'), 'alerts/flash_error');
			}
		}
		$this->set('previous_messages', $previous_messages);
	}

	public function manager_reply($id = null) {
		$previous_messages = array();
		if($this->Auth->User('id')) {
			// $this->helpers[] = 'Text';
			$this->request->data['Feedback']['user_id'] = $this->Auth->User('id');
			// $this->Feedback->recursive = -1;
			// $this->paginate['conditions'] = array('user_id' => $this->Auth->User('id'));
			// $this->paginate['limit'] = 5;
			$previous_messages = $this->Feedback->find('all', array('conditions' => array('Feedback.id' => $id)));
			// $previous_messages = $this->paginate();

		}
		if ($this->request->is('post')) {
			$this->Feedback->create();
			// if($this->Auth->User('id')) $this->request->data['Feedback']['user_id'] = $this->Auth->User('id');
			$this->Feedback->Behaviors->attach('Tools.Captcha');
			if (empty($this->data['Feedback']['bot_stop']) && $this->Feedback->save($this->request->data)) {

				//******************       Send Email to Reporter and Managers and Notifications   reporter      *****************************
                  $this->loadModel('Message');
                  $message = $this->Message->find('first', array('conditions' => array('name' => 'contact_feedback')));

                  $users = $this->Feedback->User->find('all', array(
                      'contain' => array(),
                      'conditions' => array('OR' => array('User.id' => $previous_messages[0]['Feedback']['user_id'], 'User.group_id' => array(2)))
                  ));
                  foreach ($users as $user) {
                      if($user['User']['group_id'] == 2) $actioner =  'manager';
                      if($user['User']['group_id'] == 3) $actioner =  'reporter';

                      $variables = array(
                        'name' => $user['User']['name'],  
                        'subject' => $this->request->data['Feedback']['subject'],
                        'feedback' => $this->request->data['Feedback']['feedback'],
                      );
                      $datum = array(
                        'email' => $user['User']['email'], 
                        'id' => $previous_messages[0]['Feedback']['foreign_key'], 'user_id' => $user['User']['id'], 'type' => 'contact_feedback', 'model' => 'Feedback',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );
                      CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                      if($actioner == 'reporter') CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                  }
                //**********************************    END   *********************************

				$this->Session->setFlash(__('The feedback has been saved'), 'alerts/flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your feedback could not be saved. Please, try again.'), 'alerts/flash_error');
			}
		}
		$this->set('previous_messages', $previous_messages);
	}

/**
 * edit method
 *
 * @throws NotFoundException
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
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Feedback->read(null, $id);
		}
		$users = $this->Feedback->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('Feedback deleted'), 'alerts/flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
