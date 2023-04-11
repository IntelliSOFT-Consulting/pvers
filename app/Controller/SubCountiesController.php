<?php
App::uses('AppController', 'Controller');
/**
 * SubCounties Controller
 *
 * @property SubCounty $SubCounty
 * @property PaginatorComponent $Paginator
 */
class SubCountiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('api_index','autocomplete');
	}

	public function autocomplete($county = null)
	{

		$sub_counties = $this->SubCounty->find('list', 
		// $sub_counties = $this->SubCounty->find('all', 
			array(
				'conditions' => array(
					'SubCounty.county_id' => $county
				),
				'fields' => array('SubCounty.id', 'SubCounty.sub_county_name'),
				'limit' => 10
			)
		);
		//return the results as a json array
		$this->set('sub_counties', $sub_counties);
		$this->set('_serialize', 'sub_counties');
		 

		// get sub_counties where county id = $county
		// $sub_counties = $this->SubCounty->find('all', array(
		// 	'conditions' => array(
		// 		'SubCounty.county_id' => $county
		// 	),
		// 	'fields' => array('SubCounty.id', 'SubCounty.sub_county_name'),
		// 	'limit' => 10
		// ));
		// // return the results
		// $groups = array();
		// foreach ($sub_counties as $key => $value) {
		// 	$groups[] = $value['SubCounty']['sub_county_name'];
		// }
		// $this->set('groups', array_values($groups));
		// $this->set('_serialize', 'groups');
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SubCounty->recursive = 0;
		$this->set('subCounties', $this->Paginator->paginate());
	}

	public function api_index() {
		$this->SubCounty->recursive = -1;
		$result =  $this->SubCounty->find('all', array('fields' => array('id', 'county_id', 'sub_county_name'), 'order' => array('SubCounty.sub_county_name' => 'asc')));
		$subCounties = array();
		foreach ($result as $key => $value) {
			$subCounties[] = array('id' => $value['SubCounty']['id'], 'county_id' => $value['SubCounty']['county_id'], 'sub_county_name' => $value['SubCounty']['sub_county_name']);
			// print_r($value);
		}
		$this->set('subCounties', $subCounties);
		$this->set('_serialize', array('subCounties'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SubCounty->exists($id)) {
			throw new NotFoundException(__('Invalid sub county'));
		}
		$options = array('conditions' => array('SubCounty.' . $this->SubCounty->primaryKey => $id));
		$this->set('subCounty', $this->SubCounty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SubCounty->create();
			if ($this->SubCounty->save($this->request->data)) {
				$this->Flash->success(__('The sub county has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sub county could not be saved. Please, try again.'));
			}
		}
		$counties = $this->SubCounty->County->find('list');
		$this->set(compact('counties'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SubCounty->exists($id)) {
			throw new NotFoundException(__('Invalid sub county'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SubCounty->save($this->request->data)) {
				$this->Flash->success(__('The sub county has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sub county could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SubCounty.' . $this->SubCounty->primaryKey => $id));
			$this->request->data = $this->SubCounty->find('first', $options);
		}
		$counties = $this->SubCounty->County->find('list');
		$this->set(compact('counties'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->SubCounty->exists($id)) {
			throw new NotFoundException(__('Invalid sub county'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SubCounty->delete($id)) {
			$this->Flash->success(__('The sub county has been deleted.'));
		} else {
			$this->Flash->error(__('The sub county could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
