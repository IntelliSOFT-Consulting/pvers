<?php
App::uses('AppModel', 'Model');
/**
 * County Model
 *
 * @property Sadr $Sadr
 */
class SubCounty extends AppModel {
	
	public $displayField = 'sub_county_name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'sub_county_name', 'type' => 'like')
    );

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'sub_county_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pqmp' => array(
			'className' => 'Pqmp',
			'foreignKey' => 'sub_county_id',
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

	/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
