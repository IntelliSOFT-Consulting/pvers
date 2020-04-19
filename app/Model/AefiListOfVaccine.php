<?php
App::uses('AppModel', 'Model');
/**
 * AefiListOfVaccine Model
 *
 * @property Aefi $Aefi
 */
class AefiListOfVaccine extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aefi' => array(
			'className' => 'Aefi',
			'foreignKey' => 'aefi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
