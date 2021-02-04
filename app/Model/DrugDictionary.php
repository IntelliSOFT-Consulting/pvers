<?php
App::uses('AppModel', 'Model');
/**
 * DrugDictionary Model
 *
 */
class DrugDictionary extends AppModel {
	public $displayField = 'drug_name';
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'drug_name', 'type' => 'like'),
        array('name' => 'id', 'type' => 'value'),
    );
	
	
	public function finder($query, $generic = null) {
		if (($suggestions = Cache::read($query.$generic, 'drugs')) === false) {
			$suggestions = $this->find('all', array(
				'fields' => array('DISTINCT DrugDictionary.drug_name'),
				'limit' => 20,
				'conditions' => array('DrugDictionary.drug_name LIKE' => '%'.$query.'%'), //, 'DrugDictionary.generic' => $generic
				'recursive' => -1,
			));
            // $suggestions[]['DrugDictionary']['drug_name'] = 'kweli'; 
			Cache::write($query.$generic, $suggestions, 'drugs');
		} else {
            // $suggestions[]['DrugDictionary']['drug_name'] = 'urongo'; 
        }
		return $suggestions;
    }
	
	public function findero($query, $generic = null) {
		if (($suggestions = Cache::read($query.$generic, 'brands')) === false) {
			$suggestions = $this->find('all', array(
				'fields' => array('DISTINCT DrugDictionary.trade_name'),
				'limit' => 20,
				'conditions' => array('DrugDictionary.trade_name LIKE' => '%'.$query.'%'), //, 'DrugDictionary.generic' => $generic
				'recursive' => -1,
			));
            // $suggestions[]['DrugDictionary']['trade_name'] = 'kweli'; 
			Cache::write($query.$generic, $suggestions, 'brands');
		} else {
            // $suggestions[]['DrugDictionary']['trade_name'] = 'urongo'; 
        }
		return $suggestions;
    }
	
	public $validate = array(
		'id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Med ID Required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'The WHO MED ID is alread in use. Please specify a unique code.'
			),
		),
		'drug_name' => array(
            'notEmpty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
        ),
	);

    public function afterSave($created, $options = array()) {
		Cache::clear(false,  $config = 'drugs');
		clearCache();
	}
}
