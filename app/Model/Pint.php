<?php
App::uses('AppModel', 'Model');
/**
 * Pint Model
 *
 * @property Transfusion $Transfusion
 */
class Pint extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Transfusion' => array(
			'className' => 'Transfusion',
			'foreignKey' => 'transfusion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
