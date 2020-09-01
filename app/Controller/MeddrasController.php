<?php
App::uses('AppController', 'Controller');
/**
 * Meddras Controller
 *
 * @property Meddra $Meddra
 * @property PaginatorComponent $Paginator
 */
class MeddrasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('autocomplete');
	}

	public function autocomplete($query = null) {
		$this->RequestHandler->setContent('json', 'application/json' ); 
		$groupers = $this->Meddra->finder($this->request->query['term']);			
                $groups = array();
		foreach ($groupers as $key => $value) {
			$groups[] = $value['Meddra']['llt_name'];
		}
		$this->set('groups', array_values($groups));
        $this->set('_serialize', 'groups');
	}
}
