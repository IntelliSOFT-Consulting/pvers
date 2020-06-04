<?php
App::uses('AppModel', 'Model');
/**
 * Device Model
 *
 * @property User $User
 * @property County $County
 * @property Designation $Designation
 */
class Device extends AppModel {
	public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
        array('name' => 'name_of_institution', 'type' => 'like'),
        array('name' => 'reference_no', 'type' => 'like'),
        array('name' => 'submitted', 'type' => 'value'),
        array('name' => 'serious', 'type' => 'value'),
        array('name' => 'submit', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Device.created BETWEEN ? AND ?'),
    );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Designation' => array(
			'className' => 'Designation',
			'foreignKey' => 'designation_id',
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
		'Attachment' => array(
			'className' => 'Attachment',
			'foreignKey' => 'device_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ListOfDevice' => array(
			'className' => 'ListOfDevice',
			'foreignKey' => 'device_id',
			'dependent' => true,
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
