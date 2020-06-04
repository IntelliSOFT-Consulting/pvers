<?php
App::uses('AppController', 'Controller');
App::uses('String', 'Utility');
App::uses('Sanitize', 'Utility');
App::uses('Router', 'Routing');
config('routes');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 */
class NotificationsController extends AppController {
    public $uses = array('Notification', 'User', 'Application', 'Amendment','Review', 'Message');
    public $paginate = array();
    public $components = array('Search.Prg');
    public $presetVars = true; // using the model configuration

/**
 * index method
 *
 * @return void
 */
	public function applicant_index() {
        $this->Prg->commonProcess();
        $page_options = array('20' => '20', '25' => '25');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Notification->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $criteria['Notification.user_id'] = $this->Auth->User('id');
        $this->paginate['order'] = array('Notification.created' => 'desc');
        $this->paginate['contain'] = array('User');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Notification->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('notifications', $this->paginate(), array('encode' => false));
    }
	public function reviewer_index() {
        $this->Prg->commonProcess();
        $page_options = array('20' => '20', '25' => '25');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Notification->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $criteria['Notification.user_id'] = $this->Auth->User('id');
        $this->paginate['order'] = array('Notification.created' => 'desc');
        $this->paginate['contain'] = array('User');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Notification->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('notifications', $this->paginate(), array('encode' => false));
    }

	public function index() {
		// $this->Notification->recursive = 0;
		// $this->set('notifications', $this->paginate());
		$this->Prg->commonProcess();
        $page_options = array('20' => '20', '25' => '25');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Notification->parseCriteria($this->passedArgs);
        $criteria['Notification.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Notification.created' => 'desc');
        $this->paginate['contain'] = array('User');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Notification->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('notifications', $this->paginate(), array('encode' => false));
	}
	public function admin_index() {
        $this->index();
    }
	public function manager_index() {
        $this->index();
    }
    public function inspector_index() {
        $this->index();
    }
    public function monitor_index() {
        $this->index();
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->set('notification', $this->Notification->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notification->create();
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'));
			}
		}
		$users = $this->Notification->User->find('list');
		$this->set(compact('users'));
	}

/**
 * add method
 * This method will be used by managers to resend notificatoins to that should have been sent for the active reviews
 * @return void
 */
	public function manager_resend($id = null) {
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		$review = $this->Review->read(null, $id);
		$messages = $this->Message->find('list', array(
                                    'conditions' => array('Message.name' => array('reviewer_new_application_subject', 'reviewer_new_application')),
                                    'fields' => array('Message.name', 'Message.content')));

		$variables = array(
                'protocol_link' => Router::url(array('controller' => 'applications', 'action' => 'view', $review['Review']['application_id'],
                                               'reviewer' => true), true),
                'protocol_no' => $this->Application->field('protocol_no', array('id' => $review['Review']['application_id']))
              );
		$save_data[] = array('Notification' => array(
			'user_id' => $review['Review']['user_id'],
			'type' => 'reviewer_new_application',
			'model' => 'Application',
			'foreign_key' => $review['Review']['application_id'],
			'title' => $messages['reviewer_new_application_subject'].' '.$variables['protocol_no'],
			'system_message' => String::insert($messages['reviewer_new_application'], $variables),
			'user_message' => $review['Review']['text'],
			),
		);

		$this->Notification->Create();
		if ($this->Notification->saveMany($save_data)) {
		  $this->log($save_data, 'notifications_success');
		  $this->set('response', 'The notification has been resent.');
		} else {
		  $this->log('The application could not be saved at newAppNotifyReviewer. Please, try again.', 'notifications_error');
		  $this->log($reviews, 'notifications_error');
		  $this->log($save_data, 'notifications_error');
		  $this->set('response', 'The notification could not be sent.');
		}
		$this->set('_serialize', 'response');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Notification->read(null, $id);
		}
		$users = $this->Notification->User->find('list');
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid Notification'));
		}
		if(!$this->Notification->isOwnedBy($id, $this->Auth->user('id'))) {
			$this->set('message', 'You do not have permission to access this resource');
			$this->set('_serialize', 'message');
		} else {
			if ($this->Notification->delete()) {
				$this->set('message', 'Notification deleted');
				$this->set('_serialize', 'message');
			} else {
				$this->set('message', 'Notification was not deleted');
				$this->set('_serialize', 'message');
			}
		}
	}
	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Notification->id = $id;
        if (!$this->Notification->exists()) {
            throw new NotFoundException(__('Invalid notification'));
        }
        if ($this->Notification->delete()) {
            $this->Session->setFlash(__('Notification deleted'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Notification was not deleted'), 'alerts/flash_error');
		$this->redirect($this->referer());
	}
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Notification->id = $id;
        if (!$this->Notification->exists()) {
            throw new NotFoundException(__('Invalid notification'));
        }
        if ($this->Notification->delete()) {
            $this->Session->setFlash(__('Notification deleted'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Notification was not deleted'), 'alerts/flash_error');
		$this->redirect($this->referer());
	}
	public function inspector_delete($id = null) {
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Notification->id = $id;
        if (!$this->Notification->exists()) {
            throw new NotFoundException(__('Invalid notification'));
        }
        if ($this->Notification->delete()) {
            $this->Session->setFlash(__('Notification deleted'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Notification was not deleted'), 'alerts/flash_error');
		$this->redirect($this->referer());
	}
}
