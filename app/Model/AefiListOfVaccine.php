<?php
App::uses('AppModel', 'Model');
/**
 * AefiListOfVaccine Model
 *
 * @property Aefi $Aefi
 */
class AefiListOfVaccine extends AppModel {

	public $actsAs = array('Containable');

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
		),
		'Vaccine' => array(
			'className' => 'Vaccine',
			'foreignKey' => 'vaccine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $validate = array(
		/*'vaccine_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the name of the vaccine'
			),
		),*/
		'vaccination_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the date of vaccination'
			),
		),
		// 'vaccine_manufacturer' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please specify the name of the vaccine\'s manufacturer'
		// 	),
		// ),
		// 'expiry_date' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please specify the expiry date of the vaccine'
		// 	),
		// ),
		// 'batch_number' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please specify the vaccine batch/lot number'
		// 	),
		// ),
		// 'diluent_batch_number' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please specify the diluent batch/lot number'
		// 	),
		// ),
	);

	public function beforeSave($options = array()) {
		if (!empty($this->data['AefiListOfVaccine']['vaccination_date'])) {
			$this->data['AefiListOfVaccine']['vaccination_date'] = $this->dateTimeFormatBeforeSave($this->data['AefiListOfVaccine']['vaccination_date']);
		}
		if (!empty($this->data['AefiListOfVaccine']['vaccination_time'])) {
			$this->data['AefiListOfVaccine']['vaccination_time'] = implode(':', $this->data['AefiListOfVaccine']['vaccination_time']);
		} else {
			$this->data['AefiListOfVaccine']['vaccination_time'] = '';
		}
		if (!empty($this->data['AefiListOfVaccine']['expiry_date'])) {
			$this->data['AefiListOfVaccine']['expiry_date'] = $this->dateFormatBeforeSave($this->data['AefiListOfVaccine']['expiry_date']);
		}
		if (!empty($this->data['AefiListOfVaccine']['diluent_expiry_date'])) {
			$this->data['AefiListOfVaccine']['diluent_expiry_date'] = $this->dateFormatBeforeSave($this->data['AefiListOfVaccine']['diluent_expiry_date']);
		}
		return true;
	}

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['AefiListOfVaccine']['vaccination_date'])) {
				$results[$key]['AefiListOfVaccine']['vaccination_date'] = $this->dateFormatAfterFind($val['AefiListOfVaccine']['vaccination_date']);
			}
			if (!empty($val['AefiListOfVaccine']['vaccination_time'])) {
				if(empty($val['AefiListOfVaccine']['vaccination_time'])) $val['AefiListOfVaccine']['vaccination_time'] = ':';
				$a = explode(':', $val['AefiListOfVaccine']['vaccination_time']);
				$results[$key]['AefiListOfVaccine']['vaccination_time'] = array('hour'=> $a[0],'min'=> $a[1]);
			}
			if (isset($val['AefiListOfVaccine']['expiry_date'])) {
				$results[$key]['AefiListOfVaccine']['expiry_date'] = $this->dateFormatAfterFind($val['AefiListOfVaccine']['expiry_date']);
			}
			if (isset($val['AefiListOfVaccine']['diluent_expiry_date'])) {
				$results[$key]['AefiListOfVaccine']['diluent_expiry_date'] = $this->dateFormatAfterFind($val['AefiListOfVaccine']['diluent_expiry_date']);
			}
		}
		return $results;
	}
}
