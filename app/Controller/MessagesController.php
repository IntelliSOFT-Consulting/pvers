<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {

	public $paginate = array();
    public $presetVars = true; // using the model configuration
    public $components = array('Search.Prg');
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Message->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Message.created' => 'desc');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Message->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('messages', $this->paginate(), array('encode' => false));
    }

	public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Message->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Message.created' => 'desc');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Message->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('messages', $this->paginate(), array('encode' => false));
    }

	// public function admin_index() {
	// 	$this->Message->recursive = 0;
	// 	$this->paginate['order'] = array('Message.created' => 'desc');
	// 	$this->set('messages', $this->paginate());
	// 	// pr($this->Message->find('list', array(
 //  //                                             'conditions' => array('Message.name' => array('reviewer_new_application')),
 //  //                                             'fields' => array('Message.name', 'Message.content'))));
	// }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), 'alerts/flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), 'alerts/flash_error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), 'alerts/flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), 'alerts/flash_error');
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function admin_delete($id = null) {
	// 	if (!$this->request->is('post')) {
	// 		throw new MethodNotAllowedException();
	// 	}
	// 	$this->Message->id = $id;
	// 	if (!$this->Message->exists()) {
	// 		throw new NotFoundException(__('Invalid message'));
	// 	}
	// 	if ($this->Message->delete()) {
	// 		$this->Session->setFlash(__('Message deleted'));
	// 		$this->redirect(array('action' => 'index'));
	// 	}
	// 	$this->Session->setFlash(__('Message was not deleted'));
	// 	$this->redirect(array('action' => 'index'));
	// }
}
