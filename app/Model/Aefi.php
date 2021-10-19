<?php
App::uses('AppModel', 'Model');
/**
 * Aefi Model
 *
 * @property User $User
 * @property County $County
 * @property SubCounty $SubCounty
 * @property Designation $Designation
 */
class Aefi extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $actsAs = array('Search.Searchable', 'Containable');

	public $filterArgs = array(
        'reference_no' => array('type' => 'like', 'encode' => true),
        'report_title' => array('type' => 'like', 'encode' => true),
        'name_of_institution' => array('type' => 'like', 'encode' => true),
        'serious' => array('type' => 'like', 'encode' => true),
        'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'CAST(Aefi.reporter_date as DATE) BETWEEN ? AND ?'),
        'start_date' => array('type' => 'query', 'method' => 'dummy'),
        'end_date' => array('type' => 'query', 'method' => 'dummy'),
        'county_id' => array('type' => 'value'),
        'vaccine_name' => array('type' => 'query', 'method' => 'findByVaccineName', 'encode' => true),
        'health_program' => array('type' => 'query', 'method' => 'findByHealthProgram', 'encode' => true),
        'bcg' => array('type' => 'value'),
        'convulsion' => array('type' => 'value'),
        'urticaria' => array('type' => 'value'),
        'high_fever' => array('type' => 'value'),
        'abscess' => array('type' => 'value'),
        'local_reaction' => array('type' => 'value'),
        'anaphylaxis' => array('type' => 'value'),
        'paralysis' => array('type' => 'value'),
        'toxic_shock' => array('type' => 'value'),
        'complaint_other' => array('type' => 'value'),
        'complaint_other_specify' => array('type' => 'like', 'encode' => true),
        'patient_name' => array('type' => 'like', 'encode' => true),
        'report_type' => array('type' => 'value'),
        'serious_yes' => array('type' => 'value'),
        'outcome' => array('type' => 'value'),
        'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
        'designation_id' => array('type' => 'value'),
        'gender' => array('type' => 'value'),
        'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
    );

    public function dummy($data = array()) {
    	return array( '1' => '1');
    }

    public function findByVaccineName($data = array()) {
        $vaxs = ClassRegistry::init('Vaccine')->find('list', array('conditions' => array('vaccine_name LIKE' => '%' . $data['vaccine_name'] . '%'), 'fields' => array('id', 'id')));
        $cond = array($this->alias.'.id' => $this->AefiListOfVaccine->find('list', array(
            'conditions' => array(
                'OR' => array(
                    'AefiListOfVaccine.vaccine_name LIKE' => '%' . $data['vaccine_name'] . '%',
                    'AefiListOfVaccine.vaccine_id' => $vaxs,
                    'AefiListOfVaccine.vaccine_manufacturer LIKE' => '%' . $data['vaccine_name'] . '%', )),
            'fields' => array('aefi_id', 'aefi_id')
                )));
        return $cond;
    }

    public function findByHealthProgram($data = array()) {
        $vdrugs = ClassRegistry::init('Vaccine')->find('list', array('conditions' => array('health_program' => $data['health_program']), 'fields' => array('id', 'id')));
        $cond = array($this->alias.'.id' => $this->AefiListOfVaccine->find('list', array(
            'conditions' => array(
                'OR' => array(
                    'AefiListOfVaccine.vaccine_id' => $vdrugs,
                    'AefiListOfVaccine.vaccine_manufacturer' => $vdrugs, )),
            'fields' => array('aefi_id', 'aefi_id')
                )));
        return $cond;
    }

    public function reporterFilter($data = array()) {
            $filter = $data['reporter'];
            $cond = array(
                'OR' => array(
                    $this->alias . '.reporter_name LIKE' => '%' . $filter . '%',
                    $this->alias . '.reporter_email LIKE' => '%' . $filter . '%',
                ));
            return $cond;
    }

  	public function orConditions($data = array()) {
            $filter = $data['submit'];
            if ($filter == '0') {
              $cond = array(
                    $this->alias . '.submitted' => array('1', '2', '3'),
                    // $this->alias . '.active' => '1'
                );
            } else {
              $cond = array(
                    $this->alias . '.submitted' => array('0', '1', '2', '3', '4', '5', '6'),
                    // $this->alias . '.active' => '1'
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
		), 
        'AefiOriginal' => array(
            'className' => 'Aefi',
            'foreignKey' => 'aefi_id',
            'dependent' => true,
            'conditions' => array('AefiOriginal.copied' => '1'),
        )
	);

	/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
        'AefiFollowup' => array(
            'className' => 'Aefi',
            'foreignKey' => 'aefi_id',
            'dependent' => true,
            'conditions' => array('AefiFollowup.report_type' => 'Followup'),
        ),
        'AefiDescription' => array(
            'className' => 'AefiDescription',
            'foreignKey' => 'aefi_id',
            'dependent' => true,
            'conditions' => '',
        ),
		'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Aefi', 'Attachment.group' => 'attachment'),
      	),
		'AefiListOfVaccine' => array(
			'className' => 'AefiListOfVaccine',
			'foreignKey' => 'aefi_id',
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
        'Reminder' => array(
            'className' => 'Reminder',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminder.model' => 'Aefi'),
        ),
        'ExternalComment' => array(
            'className' => 'Comment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ExternalComment.model' => 'Aefi', 'ExternalComment.category' => 'external' ),
        )
	);

	public $validate = array(
		// 'form_id' => array(
  //           'notBlank' => array(
  //               'rule'     => 'notBlank',
  //               'required' => true,
		// 		'on'       => 'create',
  //               'message'  => 'Please provide a form ID'
  //           ),
		// 	'formIdExists' => array(
  //               'rule'     => 'formIdExists',
  //               'required' => true,
		// 		'on'       => 'create',
  //               'message'  => 'The Unique form ID provided does not exist.'
  //           ),
  //       ),
		'list' => array(
            'atLeastOneVaccine' => array(
                'rule'     => 'atLeastOneVaccine',
                // 'required' => true,
                'message'  => 'Please add at least one vaccine below'
            ),
        ),
		'name_of_institution' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the institution'
            ),
        ),
        'patient_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a patient\'s name'
            ),
        ),
		'aefi_symptoms' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please describe the AEFI'
            ),
        ),
		'date_of_birth' => array(
            'ageOrDate' => array(
                'rule'     => 'ageOrDate',
                // 'required' => false,
				'allowEmpty' => true,
                'message'  => 'Please specify the patient\'s date / Year of birth or age in months'
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
		'gender' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the patient\'s gender'
            ),
        ),
		'vaccination_type' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the vaccination type (static, mass, outreach)'
            ),
        ),
		'description_of_reaction' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide brief details on the event'
            ),
        ),
		'complaint' => array(
            'atLeastOne' => array(
                'rule'     => 'atLeastOne',
                'required' => true,
                'message'  => 'Please tick at least one complaint'
            ),
        ),
        'outcome' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the AEFI outcome'
            ),
        ),
        'serious' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the seriousness of the event!!'
            ),
        ),
        'serious_yes' => array(
            'seriousYes' => array(
                'rule'     => 'seriousYes',
                'required' => false,
                'message'  => 'Please specify the reason for seriousness!!'
            ),
        ),  
		// 'treatment_given' => array(
  //           'treatOrSpecimen' => array(
  //               'rule'     => 'treatOrSpecimen',
  //               // 'required' => true,
  //               'message'  => 'Please specify the action taken i.e. treatment tiven or specimen collected'
  //           ),
  //       ),        
		'reporter_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the reporter'
            ),
        ),
        'reporter_date' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the date of submission of the report'
            ),
        ),
		'reporter_email' => array(
            'notBlank' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
        ),
    );

	public function atLeastOne($field = null) {
		return $this->data['Aefi']['bcg'] + $this->data['Aefi']['convulsion'] + $this->data['Aefi']['urticaria'] + $this->data['Aefi']['high_fever'] +
				$this->data['Aefi']['abscess'] +  $this->data['Aefi']['local_reaction'] + $this->data['Aefi']['anaphylaxis'] +
				$this->data['Aefi']['meningitis'] +  $this->data['Aefi']['paralysis'] + $this->data['Aefi']['toxic_shock'] +
				$this->data['Aefi']['complaint_other'] > 0;
	}

	public function atLeastOneVaccine($field = null) {
		if (!empty($this->data['AefiListOfVaccine'])) {
			return count($this->data['AefiListOfVaccine']) > 0;
		} 
		return false;
	}

	public function ageOrDate($field = null) {
		return !empty($this->data['Aefi']['date_of_birth']['year']) || !empty($this->data['Aefi']['age_months']);
	}

    public function treatOrSpecimen($field = null) {
        return !empty($this->data['Aefi']['treatment_given']) || !empty($this->data['Aefi']['specimen_collected']);
    }

	public function seriousYes($field = null) {
		if($this->data['Aefi']['serious'] == 'Yes') return !empty($this->data['Aefi']['serious_yes']);
        else return true;
	}

    public function beforeSave($options = array()) {
		if (!empty($this->data['Aefi']['date_of_birth'])) {
			$this->data['Aefi']['date_of_birth'] = implode('-', $this->data['Aefi']['date_of_birth']);
		} else {
			$this->data['Aefi']['date_of_birth'] = '';
		}

		if (!empty($this->data['Aefi']['time_aefi_started'])) {
			$this->data['Aefi']['time_aefi_started'] = implode(':', $this->data['Aefi']['time_aefi_started']);
		} else {
			$this->data['Aefi']['time_aefi_started'] = '';
		}

		if(empty($this->data['Aefi']['age_months'])){
			$this->data['Aefi']['age_months'] = '';
		}
		if (!empty($this->data['Aefi']['date_aefi_started'])) {
			$this->data['Aefi']['date_aefi_started'] = $this->dateFormatBeforeSave($this->data['Aefi']['date_aefi_started']);
		}
		if (!empty($this->data['Aefi']['reporter_date'])) {
			$this->data['Aefi']['reporter_date'] = $this->dateFormatBeforeSave($this->data['Aefi']['reporter_date']);
		}
		if (!empty($this->data['Aefi']['reporter_date_diff'])) {
			$this->data['Aefi']['reporter_date_diff'] = $this->dateFormatBeforeSave($this->data['Aefi']['reporter_date_diff']);
		}
		return true;
	}

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {

			if (!empty($val['Aefi']['date_of_birth'])) {
				if(empty($val['Aefi']['date_of_birth'])) $val['Aefi']['date_of_birth'] = '--';
				$a = explode('-', $val['Aefi']['date_of_birth']);
				$results[$key]['Aefi']['date_of_birth'] = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
			}
			if (!empty($val['Aefi']['time_aefi_started'])) {
				if(empty($val['Aefi']['time_aefi_started'])) $val['Aefi']['time_aefi_started'] = ':';
				$a = explode(':', $val['Aefi']['time_aefi_started']);
				$results[$key]['Aefi']['time_aefi_started'] = array('hour'=> $a[0],'min'=> $a[1]);
			}
			if (isset($val['Aefi']['date_aefi_started'])) {
				$results[$key]['Aefi']['date_aefi_started'] = $this->dateFormatAfterFind($val['Aefi']['date_aefi_started']);
			}
			if (isset($val['Aefi']['reporter_date'])) {
				$results[$key]['Aefi']['reporter_date'] = $this->dateFormatAfterFind($val['Aefi']['reporter_date']);
			}
			if (isset($val['Aefi']['reporter_date_diff'])) {
				$results[$key]['Aefi']['reporter_date_diff'] = $this->dateFormatAfterFind($val['Aefi']['reporter_date_diff']);
			}
		}
		return $results;
	}
}
