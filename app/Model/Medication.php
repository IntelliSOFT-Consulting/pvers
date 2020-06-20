<?php
App::uses('AppModel', 'Model');
/**
 * Medication Model
 *
 * @property User $User
 * @property County $County
 * @property Designation $Designation
 */
class Medication extends AppModel {

	public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
        array('name' => 'reference_no', 'type' => 'like'),
        array('name' => 'id', 'type' => 'like'),
        array('name' => 'submitted', 'type' => 'value'),
        array('name' => 'submit', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
        array('name' => 'device', 'type' => 'value'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Medication.created BETWEEN ? AND ?'),
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

	public $hasMany = array(        
		'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Medication', 'Attachment.group' => 'attachment'),
      	),
		'MedicationProduct' => array(
			'className' => 'MedicationProduct',
			'foreignKey' => 'medication_id',
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

	public function beforeSave($options = array()) {

		if (!empty($this->data['Medication']['time_of_event'])) {
			$this->data['Medication']['time_of_event'] = implode(':', $this->data['Medication']['time_of_event']);
		} else {
			$this->data['Medication']['time_of_event'] = '';
		}

		return true;
	}

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (!empty($val['Medication']['time_of_event'])) {
				if(empty($val['Medication']['time_of_event'])) $val['Medication']['time_of_event'] = ':';
				$a = explode(':', $val['Medication']['time_of_event']);
				$results[$key]['Medication']['time_of_event'] = array('hour'=> $a[0],'min'=> $a[1]);
			}
		}
		return $results;
	}
}
