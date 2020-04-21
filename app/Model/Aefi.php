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
		// 'date_of_birth' => array(
  //           'ageOrDate' => array(
  //               'rule'     => 'ageOrDate',
  //               // 'required' => true,
  //               'message'  => 'Please specify the patient\'s date / Year of birth or age group'
  //           ),
  //       ),
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

	protected function ageOrDate($field = null) {
		return !empty($field['date_of_birth']['year']) || !empty($this->data['Aefi']['age_months']);
	}

	protected function treatOrSpecimen($field = null) {
		return !empty($this->data['Aefi']['treatment_given']) || !empty($this->data['Aefi']['specimen_collected']);
	}

    public function beforeSave($options = array()) {
		if (!empty($this->data['Aefi']['date_of_birth'])) {
			$this->data['Aefi']['date_of_birth'] = implode('-', $this->data['Aefi']['date_of_birth']);
		} else {
			$this->data['Aefi']['date_of_birth'] = '';
		}


		if(empty($this->data['Aefi']['age_months'])){
			$this->data['Sadr']['age_months'] = '';
		}
		return true;
	}

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Aefi']['id'])) {
				$results[$key]['Aefi']['id'] = $this->Luhn($val['Aefi']['id']);
			}
			if (!empty($val['Aefi']['date_of_birth'])) {
				if(empty($val['Aefi']['date_of_birth'])) $val['Aefi']['date_of_birth'] = '--';
				$a = explode('-', $val['Aefi']['date_of_birth']);
				$results[$key]['Aefi']['date_of_birth'] = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
			}

		}
		return $results;
	}
}
