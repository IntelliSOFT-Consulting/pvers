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

	public $validate = array(
		'patient_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a patient\'s name or initials'
            ),
        ),
		'date_of_birth' => array(
            'ageOrDate' => array(
                'rule'     => 'ageOrDate',
                // 'required' => true,
				'allowEmpty' => true,
                'message'  => 'Please specify the patient\'s date / Year of birth or age group'
            ),
        ),
		'county_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a county',
			),
		),
		'patient_address' => array(
            'instOrAddress' => array(
                'rule'     => 'instOrAddress',
                // 'required' => true,
                'message'  => 'Please provide the patient\'s address or the name of the institution'
            ),
        ),
		'gender' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the patient\'s gender'
            ),
        ),
		'date_of_onset_of_reaction' => array(
            'atLeastYear' => array(
                'rule'     => 'atLeastYear',
                'allowEmpty' => true,
                'message'  => 'Please specify date \ Year of onset of the reaction'
            ),
			'greaterBirth' => array(
                'rule'     => 'greaterBirth',
                'allowEmpty' => true,
                'message'  => 'The date / year of birth cannot be less than the date of birth of the patient'
            ),
        ),
		'description_of_reaction' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a brief description of the reaction'
            ),
        ),
		'reporter_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the reporter'
            ),
        ),
		'reporter_email' => array(
            'notBlank' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
        )
	);

	public function atLeastYear($field = null) {
		return !empty($field['date_of_onset_of_reaction']['year']);
	}
	
	public function greaterBirth($field = null) {
		if(!empty($field['date_of_onset_of_reaction']['year']) && isset($this->data['Padr']['date_of_birth']['year'])) {
			return $field['date_of_onset_of_reaction']['year'] >= $this->data['Padr']['date_of_birth']['year'];
		}
		return  true;
	}

	public function ageOrDate($field = null) {
		return !empty($field['date_of_birth']['year']) || !empty($this->data['Padr']['age_group']);
	}

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
