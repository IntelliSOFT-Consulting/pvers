<?php
App::uses('AppModel', 'Model');
/**
 * SubCounty Model
 *
 * @property County $County
 * @property Aefi $Aefi
 * @property Padr $Padr
 * @property Pqmp $Pqmp
 * @property Sadr $Sadr
 */
class SubCounty extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Aefi' => array(
			'className' => 'Aefi',
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
		'Padr' => array(
			'className' => 'Padr',
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
		),
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
		)
	);

}
