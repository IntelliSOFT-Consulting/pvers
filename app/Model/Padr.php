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

	public $actsAs = array('Search.Searchable', 'Containable');
	public $filterArgs = array(
        'reference_no' => array('type' => 'like', 'encode' => true),
        'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'CAST(Padr.created as DATE) BETWEEN ? AND ?'),
        'start_date' => array('type' => 'query', 'method' => 'dummy'),
        'end_date' => array('type' => 'query', 'method' => 'dummy'),
        'county_id' => array('type' => 'value'),
        'drug_name' => array('type' => 'query', 'method' => 'findByDrugName', 'encode' => true),
        'product_specify' => array('type' => 'like', 'encode' => true),
        'patient_name' => array('type' => 'like', 'encode' => true),
        'report_type' => array('type' => 'value'),
        'reaction_on' => array('type' => 'value'),
        'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
        'designation_id' => array('type' => 'value'),
        'gender' => array('type' => 'value'),
        'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
    );

    public function dummy($data = array()) {
    	return array( '1' => '1');
    }

    public function findByDrugName($data = array()) {
            $cond = array($this->alias.'.id' => $this->PadrListOfMedicine->find('list', array(
                'conditions' => array(
                    'OR' => array(
                        'PadrListOfMedicine.product_name LIKE' => '%' . $data['drug_name'] . '%',
                        'PadrListOfMedicine.manufacturer LIKE' => '%' . $data['drug_name'] . '%', )),
                'fields' => array('padr_id', 'padr_id')
                    )));
            return $cond;
    }

    public function reporterFilter($data = array()) {
            $filter = $data['reporter'];
            $cond = array(
                'OR' => array(
                    $this->alias . '.reporter_name LIKE' => '%' . $filter . '%',
                    $this->alias . '.reporter_email LIKE' => '%' . $filter . '%',
                    $this->alias . '.reporter_name_diff LIKE' => '%' . $filter . '%',
                    $this->alias . '.reporter_email_diff LIKE' => '%' . $filter . '%',
                ));
            return $cond;
    }

	public function makeRangeCondition($data = array()) {
		if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
		else $start_date = date('Y-m-d', strtotime('2012-05-01'));

		if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
		else $end_date = date('Y-m-d');

		return array($start_date, $end_date);
	}
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
		),
		'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Padr', 'Attachment.group' => 'attachment'),
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
            'dobLessToday' => array(
                'rule'     => 'dobLessToday',
                // 'required' => true,
				'allowEmpty' => true,
                'message'  => 'Invalid date of birth. Greater than today.'
            ),
        ),
		'county_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a county',
			),
		),
		/*'patient_address' => array(
            'instOrAddress' => array(
                'rule'     => 'instOrAddress',
                // 'required' => true,
                'message'  => 'Please provide the patient\'s address or the name of the institution'
            ),
        ),*/
		/*'gender' => array(
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
                'message'  => 'Please specify when the side effect started.'
            ),
			'greaterBirth' => array(
                'rule'     => 'greaterBirth',
                'allowEmpty' => true,
                'message'  => 'The date / year of birth cannot be less than the date the reaction started.'
            ),
        ),
		'description_of_reaction' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a brief description of the reaction'
            ),
        ),*/
		'reporter_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the reporter'
            ),
        ),
		'reporter_email' => array(
            'emailOrMobile' => array(
                'rule'     => 'emailOrMobile',
                // 'allowEmpty' => true,
                'message'  => 'Please provide email or phone number'
            ),
        ),
		'reporter_phone' => array(
            'emailOrMobile' => array(
                'rule'     => 'emailOrMobile',
                // 'allowEmpty' => true,
                'message'  => 'Please provide email or phone number'
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

	public function dobLessToday($field = null) {
		if(!empty($field['date_of_birth']['day']) && !empty($field['date_of_birth']['month']) && !empty($field['date_of_birth']['year'])) {
			return strtotime(implode('-', $field['date_of_birth'])) <= strtotime("now");
		} elseif(!empty($field['date_of_birth']['month']) && !empty($field['date_of_birth']['year'])) {
			return $field['date_of_birth']['month'] <= date('m', strtotime("now")) && $field['date_of_birth']['year'] <= date('Y', strtotime("now"));
		} elseif(!empty($field['date_of_birth']['year'])) {
			return $field['date_of_birth']['year'] <= date('Y', strtotime("now"));
		}
		return !empty($field['date_of_birth']['year']) || !empty($this->data['Padr']['age_group']);
	}

	public function emailOrMobile($field = null) {
		return !empty($this->data['Padr']['reporter_email']) || !empty($this->data['Padr']['reporter_phone']);
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

		/*if (!empty($this->data['Padr']['date_of_end_of_reaction'])) {
			$this->data['Padr']['date_of_end_of_reaction'] = implode('-', $this->data['Padr']['date_of_end_of_reaction']);
		} else {
			$this->data['Padr']['date_of_end_of_reaction'] = '';
		}*/

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
			/*if (!empty($val['Padr']['date_of_end_of_reaction'])) {
				if(empty($val['Padr']['date_of_end_of_reaction'])) $val['Padr']['date_of_end_of_reaction'] = '--';
				$b = explode('-', $val['Padr']['date_of_end_of_reaction']);
				$results[$key]['Padr']['date_of_end_of_reaction'] = array('day'=> $b[0],'month'=> $b[1],'year'=> $b[2]);
			}*/
			
		}
		return $results;
	}
}
