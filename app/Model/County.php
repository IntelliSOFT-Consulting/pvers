<?php
App::uses('AppModel', 'Model');
/**
 * County Model
 *
 * @property Sadr $Sadr
 */
class County extends AppModel {
	
	public $displayField = 'county_name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'county_name', 'type' => 'like')
    );
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'county_id',
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

}
