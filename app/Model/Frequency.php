<?php
App::uses('AppModel', 'Model');
/**
 * Frequency Model
 *
 * @property SadrListOfDrug $SadrListOfDrug
 */
class Frequency extends AppModel {
	
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'value', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
    );
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SadrListOfDrug' => array(
			'className' => 'SadrListOfDrug',
			'foreignKey' => 'frequency_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $validate = array(
		'value' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a value'
            ),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'The icsr code is alread in use. Please specify a unique code.'
			),
        ),
		'name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
        ),
	);
}
