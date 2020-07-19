<?php
App::uses('AppModel', 'Model');
/**
 * SadrListOfMedicine Model
 *
 * @property Sadr $Sadr
 * @property SadrFollowup $SadrFollowup
 * @property Dose $Dose
 * @property Route $Route
 * @property Frequency $Frequency
 */
class SadrListOfMedicine extends AppModel {


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
		),
		'Dose' => array(
			'className' => 'Dose',
			'foreignKey' => 'dose_id',
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
		),
		'Frequency' => array(
			'className' => 'Frequency',
			'foreignKey' => 'frequency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $validate = array(
		'brand_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the brand name for past medical history'
			),
		),
	);

	public function beforeSave($options = array()) {
		if (!empty($this->data['SadrListOfMedicine']['start_date'])) {
			$this->data['SadrListOfMedicine']['start_date'] = $this->dateFormatBeforeSave($this->data['SadrListOfMedicine']['start_date']);
		}
		if (!empty($this->data['SadrListOfMedicine']['stop_date'])) {
			$this->data['SadrListOfMedicine']['stop_date'] = $this->dateFormatBeforeSave($this->data['SadrListOfMedicine']['stop_date']);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['SadrListOfMedicine']['start_date'])) {
				$results[$key]['SadrListOfMedicine']['start_date'] = $this->dateFormatAfterFind($val['SadrListOfMedicine']['start_date']);
			}
			if (isset($val['SadrListOfMedicine']['stop_date'])) {
				$results[$key]['SadrListOfMedicine']['stop_date'] = $this->dateFormatAfterFind($val['SadrListOfMedicine']['stop_date']);
			}
		}
		return $results;
	}
}
