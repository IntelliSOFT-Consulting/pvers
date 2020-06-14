<?php
App::uses('AppModel', 'Model');
/**
 * PadrListOfMedicine Model
 *
 * @property Padr $Padr
 */
class PadrListOfMedicine extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Padr' => array(
			'className' => 'Padr',
			'foreignKey' => 'padr_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
