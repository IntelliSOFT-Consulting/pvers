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

	public $validate = array(
		'product_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the name of the medicine'
			),
		),
	);

	public function beforeSave($options = array()) {
		if (!empty($this->data['PadrListOfMedicine']['start_date'])) {
			$this->data['PadrListOfMedicine']['start_date'] = $this->dateFormatBeforeSave($this->data['PadrListOfMedicine']['start_date']);
		}
		if (!empty($this->data['PadrListOfMedicine']['stop_date'])) {
			$this->data['PadrListOfMedicine']['stop_date'] = $this->dateFormatBeforeSave($this->data['PadrListOfMedicine']['stop_date']);
		}
		if (!empty($this->data['PadrListOfMedicine']['expiry_date'])) {
			$this->data['PadrListOfMedicine']['expiry_date'] = $this->dateFormatBeforeSave($this->data['PadrListOfMedicine']['expiry_date']);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['PadrListOfMedicine']['start_date'])) {
				$results[$key]['PadrListOfMedicine']['start_date'] = $this->dateFormatAfterFind($val['PadrListOfMedicine']['start_date']);
			}
			if (isset($val['PadrListOfMedicine']['stop_date'])) {
				$results[$key]['PadrListOfMedicine']['stop_date'] = $this->dateFormatAfterFind($val['PadrListOfMedicine']['stop_date']);
			}
			if (isset($val['PadrListOfMedicine']['expiry_date'])) {
				$results[$key]['PadrListOfMedicine']['expiry_date'] = $this->dateFormatAfterFind($val['PadrListOfMedicine']['expiry_date']);
			}
		}
		return $results;
	}
}
