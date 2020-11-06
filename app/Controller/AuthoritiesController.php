<?php
App::uses('AppController', 'Controller');
/**
 * Authorities Controller
 *
 * @property Authority $Authority
 * @property PaginatorComponent $Paginator
 */
class AuthoritiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'autocomplete');
	}
	
	public function autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		if (is_numeric($this->request->query['term'])) { 
			$coders = $this->Authority->finder($this->request->query['term'], 'N');
		} else {
			$coders = $this->Authority->finder($this->request->query['term'], 'A');
		}
        $codes = array();
		foreach ($coders as $key => $value) {
			$codes[] = array('value' => $value['Authority']['mah_company_email'], 'label' => $value['Authority']['mah_name'],  'code' => $value['Authority']['master_mah'], 
							 'addr' => $value['Authority']['mah_company_address'], 'phone' => $value['Authority']['mah_company_telephone']);
		}
		$this->set('codes', $codes);
        $this->set('_serialize', 'codes');
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Authority->recursive = 0;
		$this->set('authorities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Authority->exists($id)) {
			throw new NotFoundException(__('Invalid authority'));
		}
		$options = array('conditions' => array('Authority.' . $this->Authority->primaryKey => $id));
		$this->set('authority', $this->Authority->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Authority->create();
			if ($this->Authority->save($this->request->data)) {
				$this->Flash->success(__('The authority has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The authority could not be saved. Please, try again.'));
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
		if (!$this->Authority->exists($id)) {
			throw new NotFoundException(__('Invalid authority'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Authority->save($this->request->data)) {
				$this->Flash->success(__('The authority has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The authority could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Authority.' . $this->Authority->primaryKey => $id));
			$this->request->data = $this->Authority->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Authority->exists($id)) {
			throw new NotFoundException(__('Invalid authority'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Authority->delete($id)) {
			$this->Flash->success(__('The authority has been deleted.'));
		} else {
			$this->Flash->error(__('The authority could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
