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

	  public $validate = array(
        'generic_name_i' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide product no. 1 (intended)'
            ),
        ),
        'generic_name_ii' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide product no. 1 (error)'
            ),
        ),
    );
}
