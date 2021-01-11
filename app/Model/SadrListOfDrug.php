<?php
App::uses('AppModel', 'Model');
/**
 * SadrListOfDrug Model
 *
 * @property Sadr $Sadr
 */
class SadrListOfDrug extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		'SadrFollowup' => array(
			'className' => 'SadrFollowup',
			'foreignKey' => 'sadr_followup_id',
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
		),
	);

	public $validate = array(
		'drug_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the suspected drug'
			),
		),
		/*'brand_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the brand name of the suspected drug'
			),
		),*/
		'dose' => array(
			'numeric' => array(
				'rule'     => 'numeric',
				'required' => true,
				'message'  => 'Please specify the dosage'
			),
		),
		'dose_id' => array(
			'numeric' => array(
				'rule'     => 'numeric',
				'required' => true,
				'message'  => 'Please specify the dose units'
			),
		),
		'route_id' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the route'
			),
		),
		'frequency_id' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the frequency'
			),
		),
		/*'Indication' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the indication'
			),
		),*/
		'start_date' => array(
			'ifSuspected' => array(
				'rule'     => 'ifSuspected',
				'required' => true,
				'message'  => 'Please specify the start date for the suspected drug'
			),
			'beforeStopDate' => array(
				'rule'     => 'beforeStopDate',
				'message'  => 'The start date must come before the stop date'
			),
		),
	);

	public function beforeStopDate($field = null){
		if(!empty($this->data['SadrListOfDrug']['stop_date'])) {
			return (strtotime($field['start_date']) <= strtotime($this->data['SadrListOfDrug']['stop_date']));
		}
		return true;
    }

	public function ifSuspected($field = null){
		if($this->data['SadrListOfDrug']['suspected_drug']) {
			return (!empty($field['start_date']));
		}
		return true;
    }

	public function beforeSave($options = array()) {
		if (!empty($this->data['SadrListOfDrug']['start_date'])) {
			$this->data['SadrListOfDrug']['start_date'] = $this->dateFormatBeforeSave($this->data['SadrListOfDrug']['start_date']);
		}
		if (!empty($this->data['SadrListOfDrug']['stop_date'])) {
			$this->data['SadrListOfDrug']['stop_date'] = $this->dateFormatBeforeSave($this->data['SadrListOfDrug']['stop_date']);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['SadrListOfDrug']['start_date'])) {
				$results[$key]['SadrListOfDrug']['start_date'] = $this->dateFormatAfterFind($val['SadrListOfDrug']['start_date']);
			}
			if (isset($val['SadrListOfDrug']['stop_date'])) {
				$results[$key]['SadrListOfDrug']['stop_date'] = $this->dateFormatAfterFind($val['SadrListOfDrug']['stop_date']);
			}
		}
		return $results;
	}

}
