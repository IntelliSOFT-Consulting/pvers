<?php
App::uses('AppModel', 'Model');
/**
 * ConcomittantDrug Model
 *
 * @property Sae $Sae
 * @property Route $Route
 */
class ConcomittantDrug extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'deleted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sae' => array(
			'className' => 'Sae',
			'foreignKey' => 'sae_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
