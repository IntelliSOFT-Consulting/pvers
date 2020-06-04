<?php
App::uses('AppModel', 'Model');
/**
 * MedicationProduct Model
 *
 * @property Medication $Medication
 */
class MedicationProduct extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Medication' => array(
			'className' => 'Medication',
			'foreignKey' => 'medication_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
