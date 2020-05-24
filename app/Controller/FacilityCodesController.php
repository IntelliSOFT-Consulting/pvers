<?php
App::uses('AppController', 'Controller');
/**
 * FacilityCodes Controller
 *
 * @property FacilityCode $FacilityCode
 */
class FacilityCodesController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'facility_code', 'type' => 'value'),
        array('field' => 'facility_name', 'type' => 'value'),
    );

	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'autocomplete');
	}
	
	public function autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		if (is_numeric($this->request->query['term'])) { 
			$coders = $this->FacilityCode->finder($this->request->query['term'], 'N');
		} else {
			$coders = $this->FacilityCode->finder($this->request->query['term'], 'A');
		}
                $codes = array();
		foreach ($coders as $key => $value) {
			$codes[] = array('value' => $value['FacilityCode']['facility_code'], 'label' => $value['FacilityCode']['facility_name'],  'sub_county' => $value['FacilityCode']['district'], 
							 'desc' => $value['FacilityCode']['county'], 'addr' => $value['FacilityCode']['official_address'], 'phone' => $value['FacilityCode']['official_mobile']);
		}
		$this->set('codes', $codes);
        $this->set('_serialize', 'codes');
	}
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FacilityCode->recursive = 0;
		$this->set('facilityCodes', $this->paginate());
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->FacilityCode->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
        $this->paginate['conditions'] = $criteria;
 		$this->FacilityCode->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('FacilityCode.facility_name' => 'asc');
		$this->set('facility_Codes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FacilityCode->id = $id;
		if (!$this->FacilityCode->exists()) {
			throw new NotFoundException(__('Invalid facility code'));
		}
		$this->set('facilityCode', $this->FacilityCode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacilityCode->create();
			if ($this->FacilityCode->save($this->request->data)) {
				$this->Session->setFlash(__('The facility code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility code could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacilityCode->create();
			if ($this->FacilityCode->save($this->request->data)) {
				$this->Session->setFlash(__('The facility code has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility code could not be saved. Please, try again.'), 'flash_error');
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
		$this->FacilityCode->id = $id;
		if (!$this->FacilityCode->exists()) {
			throw new NotFoundException(__('Invalid facility code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FacilityCode->save($this->request->data)) {
				$this->Session->setFlash(__('The facility code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FacilityCode->read(null, $id);
		}
	}

	public function admin_edit($id = null) {
		$this->FacilityCode->id = $id;
		if (!$this->FacilityCode->exists()) {
			throw new NotFoundException(__('Invalid facility code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FacilityCode->save($this->request->data)) {
				$this->Session->setFlash(__('The facility code has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility code could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->FacilityCode->read(null, $id);
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
		$this->FacilityCode->id = $id;
		if (!$this->FacilityCode->exists()) {
			throw new NotFoundException(__('Invalid facility code'));
		}
		if ($this->FacilityCode->delete()) {
			$this->Session->setFlash(__('Facility code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Facility code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FacilityCode->id = $id;
		if (!$this->FacilityCode->exists()) {
			throw new NotFoundException(__('Invalid facility code'));
		}
		if ($this->FacilityCode->delete()) {
			$this->Session->setFlash(__('Facility code deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Facility code was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
