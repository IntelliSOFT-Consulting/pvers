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
	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
        array('field' => 'llt_name', 'type' => 'value'),
    );

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


	public function admin_index() {
		$this->Prg->commonProcess();
		$criteria = $this->Meddra->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
 		$this->Meddra->recursive = -1;
        $this->paginate['limit'] = 20;
        $this->paginate['order'] = array('Meddra.llt_name' => 'asc');
		$this->set('meddras', $this->paginate());
	}
}
