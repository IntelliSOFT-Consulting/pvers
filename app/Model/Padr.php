<?php
App::uses('AppModel', 'Model');
/**
 * Padr Model
 *
 * @property Padr $Padr
 * @property User $User
 * @property County $County
 * @property SubCounty $SubCounty
 * @property Designation $Designation
 * @property Vigiflow $Vigiflow
 */
class Padr extends AppModel {


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
		'SubCounty' => array(
			'className' => 'SubCounty',
			'foreignKey' => 'sub_county_id',
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
		'PadrListOfMedicine' => array(
			'className' => 'PadrListOfMedicine',
			'foreignKey' => 'padr_id',
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
		if (!empty($this->data['Padr']['date_of_birth'])) {
			$this->data['Padr']['date_of_birth'] = implode('-', $this->data['Padr']['date_of_birth']);
		} else {
			$this->data['Padr']['date_of_birth'] = '';
		}

		if (!empty($this->data['Padr']['date_of_onset_of_reaction'])) {
			$this->data['Padr']['date_of_onset_of_reaction'] = implode('-', $this->data['Padr']['date_of_onset_of_reaction']);
		} else {
			$this->data['Padr']['date_of_onset_of_reaction'] = '';
		}

		if (!empty($this->data['Padr']['date_of_end_of_reaction'])) {
			$this->data['Padr']['date_of_end_of_reaction'] = implode('-', $this->data['Padr']['date_of_end_of_reaction']);
		} else {
			$this->data['Padr']['date_of_end_of_reaction'] = '';
		}

		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (!empty($val['Padr']['date_of_birth'])) {
				if(empty($val['Padr']['date_of_birth'])) $val['Padr']['date_of_birth'] = '--';
				$a = explode('-', $val['Padr']['date_of_birth']);
				$results[$key]['Padr']['date_of_birth'] = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
			}
			if (!empty($val['Padr']['date_of_onset_of_reaction'])) {
				if(empty($val['Padr']['date_of_onset_of_reaction'])) $val['Padr']['date_of_onset_of_reaction'] = '--';
				$b = explode('-', $val['Padr']['date_of_onset_of_reaction']);
				$results[$key]['Padr']['date_of_onset_of_reaction'] = array('day'=> $b[0],'month'=> $b[1],'year'=> $b[2]);
			}
			if (!empty($val['Padr']['date_of_end_of_reaction'])) {
				if(empty($val['Padr']['date_of_end_of_reaction'])) $val['Padr']['date_of_end_of_reaction'] = '--';
				$b = explode('-', $val['Padr']['date_of_end_of_reaction']);
				$results[$key]['Padr']['date_of_end_of_reaction'] = array('day'=> $b[0],'month'=> $b[1],'year'=> $b[2]);
			}
			
		}
		return $results;
	}
}
