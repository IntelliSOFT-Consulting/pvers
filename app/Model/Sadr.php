<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * Sadr Model
 *
 * @property User $User
 * @property Attachment $Attachment
 * @property SadrListOfDrug $SadrListOfDrug
 */
class Sadr extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
        array('name' => 'report_title', 'type' => 'like'),
        array('name' => 'id', 'type' => 'like'),
        array('name' => 'submitted', 'type' => 'value'),
        array('name' => 'submit', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
        array('name' => 'device', 'type' => 'value'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Sadr.created BETWEEN ? AND ?'),
    );

  public function orConditions($data = array()) {
            $filter = $data['submit'];
            if ($filter == '0') {
              $cond = array(
                    $this->alias . '.submitted' => array('0', '1'),
                    $this->alias . '.active' => '1'
                );
            } else {
              $cond = array(
                    $this->alias . '.submitted' => array('2', '3', '4', '5', '6'),
                    $this->alias . '.active' => '1'
                );
            }
            return $cond;
        }

	public function makeRangeCondition($data = array()) {
		if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
		else $start_date = date('Y-m-d', strtotime('2012-05-01'));

		if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
		else $end_date = date('Y-m-d');

		return array($start_date, $end_date);
	}

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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attachment' => array(
			'className' => 'Attachment',
			'foreignKey' => 'sadr_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SadrListOfDrug' => array(
			'className' => 'SadrListOfDrug',
			'foreignKey' => 'sadr_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SadrListOfMedicine' => array(
			'className' => 'SadrListOfMedicine',
			'foreignKey' => 'sadr_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SadrFollowup' => array(
			'className' => 'SadrFollowup',
			'foreignKey' => 'sadr_id',
			'dependent' => false,
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
		'list' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please tick at least one option in the list of drugs below'
            ),
        ),
		'form_id' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
				'on'       => 'create',
                'message'  => 'Please provide a form ID'
            ),
			'formIdExists' => array(
                'rule'     => 'formIdExists',
                'required' => true,
				'on'       => 'create',
                'message'  => 'The Unique form ID provided does not exist.'
            ),
        ),
		'report_title' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a title for the report'
            ),
        ),
		'patient_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a patient\'s name or initials'
            ),
        ),
		'report_type' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
				'on'       => 'create',
                'message'  => 'Please specify the type of report'
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
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'designation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please specify your designation',
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
			'dateAfterStartDates' => array(
                'rule'     => 'dateAfterStartDates',
                'allowEmpty' => true,
                'message'  => 'The date of onset of the reaction must come after a start date in the list of start dates below'
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
		'action_taken' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the action taken'
            ),
        ),
            'outcome' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the outcome'
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
        ),
		'weight' => array(
			'rule'    => 'numeric',
			'allowEmpty' => true,
			'message' => 'Please specify the numeric weight in Kilograms.'
		),
		'height' => array(
			'rule'    => 'numeric',
			'allowEmpty' => true,
			'message' => 'Please specify the height in Centimeters.'
		)
	);

	public function dateAfterStartDates($field = null) {
		if (!empty($this->data['SadrListOfDrug'])) {
			foreach ($this->data['SadrListOfDrug'] as $val) {
				if(!empty($field['date_of_onset_of_reaction']['day']) && !empty($field['date_of_onset_of_reaction']['month']) && !empty($field['date_of_onset_of_reaction']['year'])) {
					return strtotime(implode('-', $field['date_of_onset_of_reaction'])) >= strtotime($val['start_date']);
				} else {
					return $field['date_of_onset_of_reaction']['year'] >= date('Y', strtotime($val['start_date']));
				}
			}
		}
		return true;
	}

	public function formIdExists($field = null) {
		return $this->find('count', array('conditions' => array('Sadr.id' => $field['form_id']))) > 0;
	}

	public function atLeastYear($field = null) {
		return !empty($field['date_of_onset_of_reaction']['year']);
	}

	public function ageOrDate($field = null) {
		return !empty($field['date_of_birth']['year']) || !empty($this->data['Sadr']['age_group']);
	}

	public function instOrAddress($field = null) {
		return !empty($field['patient_address']) || !empty($this->data['Sadr']['name_of_institution']);
	}

	public function greaterBirth($field = null) {
		if(!empty($field['date_of_onset_of_reaction']['year']) && isset($this->data['Sadr']['date_of_birth']['year'])) {
			return $field['date_of_onset_of_reaction']['year'] >= $this->data['Sadr']['date_of_birth']['year'];
		}
		return  true;
	}

	public function beforeValidate($options = array()){
		if (isset($this->data['SadrListOfDrug'])) {
			foreach ($this->data['SadrListOfDrug'] as $val){
				if ($val['suspected_drug'] == 1) {
					$this->data['Sadr']['list'] = 1;
				}
			}
		}
		return true;
	}

	public function beforeSave($options = array()) {
		if (!empty($this->data['Sadr']['date_of_birth'])) {
			$this->data['Sadr']['date_of_birth'] = implode('-', $this->data['Sadr']['date_of_birth']);
		} else {
			$this->data['Sadr']['date_of_birth'] = '';
		}

		if (!empty($this->data['Sadr']['date_of_onset_of_reaction'])) {
			$this->data['Sadr']['date_of_onset_of_reaction'] = implode('-', $this->data['Sadr']['date_of_onset_of_reaction']);
		} else {
			$this->data['Sadr']['date_of_onset_of_reaction'] = '';
		}

		if(empty($this->data['Sadr']['pregnancy_status'])){
			$this->data['Sadr']['pregnancy_status'] = '';
		}
		if(empty($this->data['Sadr']['age_group'])){
			$this->data['Sadr']['age_group'] = '';
		}
		if (!empty($this->data['Sadr']['reporter_date'])) {
			$this->data['Sadr']['reporter_date'] = $this->dateFormatBeforeSave($this->data['Sadr']['reporter_date']);
		}
		if (!empty($this->data['Sadr']['reporter_date_diff'])) {
			$this->data['Sadr']['reporter_date_diff'] = $this->dateFormatBeforeSave($this->data['Sadr']['reporter_date_diff']);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (!empty($val['Sadr']['date_of_birth'])) {
				if(empty($val['Sadr']['date_of_birth'])) $val['Sadr']['date_of_birth'] = '--';
				$a = explode('-', $val['Sadr']['date_of_birth']);
				$results[$key]['Sadr']['date_of_birth'] = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
			}
			if (!empty($val['Sadr']['date_of_onset_of_reaction'])) {
				if(empty($val['Sadr']['date_of_onset_of_reaction'])) $val['Sadr']['date_of_onset_of_reaction'] = '--';
				$b = explode('-', $val['Sadr']['date_of_onset_of_reaction']);
				$results[$key]['Sadr']['date_of_onset_of_reaction'] = array('day'=> $b[0],'month'=> $b[1],'year'=> $b[2]);
			}
			// if (isset($val['Sadr']['created'])) {
				// $results[$key]['Sadr']['created'] = $this->dateFormatAfterFind($val['Sadr']['created']);
			// }
			if (isset($val['SadrListOfDrug'])) {
				foreach ($val['SadrListOfDrug'] as $kay => $vall) {
					if (isset($vall['start_date'])) {
						$results[$key]['SadrListOfDrug'][$kay]['start_date'] = $this->dateFormatAfterFind($vall['start_date']);
					}
					if (isset($vall['stop_date'])) {
						$results[$key]['SadrListOfDrug'][$kay]['stop_date'] = $this->dateFormatAfterFind($vall['stop_date']);
					}
				}
			}
			if (isset($val['Sadr']['reporter_date'])) {
				$results[$key]['Sadr']['reporter_date'] = $this->dateFormatAfterFind($val['Sadr']['reporter_date']);
			}
			if (isset($val['Sadr']['reporter_date_diff'])) {
				$results[$key]['Sadr']['reporter_date_diff'] = $this->dateFormatAfterFind($val['Sadr']['reporter_date_diff']);
			}
		}
		return $results;
	}

}
