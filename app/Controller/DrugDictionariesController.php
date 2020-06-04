<?php
App::uses('AppController', 'Controller');
/**
 * DrugDictionaries Controller
 *
 * @property DrugDictionary $DrugDictionary
 */
class DrugDictionariesController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'drug_name', 'type' => 'value'),
    );

	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('autocomplete', 'autocomblete');
	}

	public function autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		$groupers = $this->DrugDictionary->finder($this->request->query['term'], 'Y');			
                $groups = array();
		foreach ($groupers as $key => $value) {
			$groups[] = $value['DrugDictionary']['drug_name'];
		}
		$this->set('groups', array_values($groups));
        $this->set('_serialize', 'groups');
	}
	
	public function autocomblete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		$groupers = $this->DrugDictionary->finder($this->request->query['term'], 'N');			
                $groups = array();
		foreach ($groupers as $key => $value) {
			$groups[] = $value['DrugDictionary']['drug_name'];
		}
		$this->set('groups', array_values($groups));
        $this->set('_serialize', 'groups');
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DrugDictionary->recursive = 0;
		$this->set('drugDictionaries', $this->paginate());
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->DrugDictionary->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->DrugDictionary->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('DrugDictionary.drug_name' => 'asc');
		$this->set('drugDictionaries', $this->paginate());
	}
	
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DrugDictionary->id = $id;
		if (!$this->DrugDictionary->exists()) {
			throw new NotFoundException(__('Invalid drug dictionary'));
		}
		$this->set('drugDictionary', $this->DrugDictionary->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DrugDictionary->create();
			if ($this->DrugDictionary->save($this->request->data)) {
				$this->Session->setFlash(__('The drug dictionary has been saved'), 'flash_success');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The drug dictionary could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DrugDictionary->create();
			if ($this->DrugDictionary->save($this->request->data)) {
				$this->Session->setFlash(__('The drug dictionary has been saved'), 'flash_success');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The drug dictionary could not be saved. Please, try again.'), 'flash_error');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->DrugDictionary->id = $id;
		if (!$this->DrugDictionary->exists()) {
			throw new NotFoundException(__('Invalid drug dictionary'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DrugDictionary->save($this->request->data)) {
				$this->Session->setFlash(__('The drug dictionary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug dictionary could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->DrugDictionary->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->DrugDictionary->id = $id;
		if (!$this->DrugDictionary->exists()) {
			throw new NotFoundException(__('Invalid drug dictionary'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DrugDictionary->save($this->request->data)) {
				$this->Session->setFlash(__('The drug dictionary has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug dictionary could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->DrugDictionary->read(null, $id);
		}
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
		$this->DrugDictionary->id = $id;
		if (!$this->DrugDictionary->exists()) {
			throw new NotFoundException(__('Invalid drug dictionary'));
		}
		if ($this->DrugDictionary->delete()) {
			$this->Session->setFlash(__('Drug dictionary deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Drug dictionary was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->DrugDictionary->id = $id;
		if (!$this->DrugDictionary->exists()) {
			throw new NotFoundException(__('Invalid drug dictionary'));
		}
		if ($this->DrugDictionary->delete()) {
			$this->Session->setFlash(__('Drug dictionary deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Drug dictionary was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
