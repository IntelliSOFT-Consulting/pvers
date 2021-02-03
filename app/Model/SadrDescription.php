<?php
App::uses('AppModel', 'Model');
/**
 * SadrDescription Model
 *
 * @property Sadr $Sadr
 */
class SadrDescription extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'sadr_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
