<?php
App::uses('AppModel', 'Model');
/**
 * Transfusion Model
 *
 * @property User $User
 * @property County $County
 * @property Designation $Designation
 */
class Transfusion extends AppModel {
	public $actsAs = array('Search.Searchable', 'Containable');

	public $filterArgs = array(
        'reference_no' => array('type' => 'like', 'encode' => true),
        'diagnosis' => array('type' => 'like', 'encode' => true),
        'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Transfusion.created BETWEEN ? AND ?'),
        'start_date' => array('type' => 'query', 'method' => 'dummy'),
        'end_date' => array('type' => 'query', 'method' => 'dummy'),
        'previous_transfusion' => array('type' => 'value'),
        'previous_reactions' => array('type' => 'value'),
        'ward' => array('type' => 'like', 'encode' => true),
        'reaction_fever' => array('type' => 'value'),
        'reaction_chills' => array('type' => 'value'),
        'reaction_flushing' => array('type' => 'value'),
        'reaction_vomiting' => array('type' => 'value'),
        'reaction_dermatological' => array('type' => 'value'),
        'reaction_cardiac' => array('type' => 'value'),
        'reaction_renal' => array('type' => 'value'),
        'reaction_haematological' => array('type' => 'value'),
        'lab_hemolysis' => array('type' => 'value'),
        'lab_hemolysis_present' => array('type' => 'value'),
        'recipient_blood' => array('type' => 'value'),
        'donor_hemolysis' => array('type' => 'value'),
        'component' => array('type' => 'query', 'method' => 'findByComponentName', 'encode' => true),
        'patient_name' => array('type' => 'like', 'encode' => true),
        'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
        'designation_id' => array('type' => 'value'),
        'gender' => array('type' => 'value'),
        'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
    );

    public function dummy($data = array()) {
    	return array( '1' => '1');
    }

    public function findByComponentName($data = array()) {
            $cond = array($this->alias.'.id' => $this->Pint->find('list', array(
                'conditions' => array(
                    'OR' => array(
                        'Pint.component_type LIKE' => '%' . $data['component'] . '%',
                        'Pint.pint_no LIKE' => '%' . $data['component'] . '%', )),
                'fields' => array('transfusion_id', 'transfusion_id')
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
		'Designation' => array(
			'className' => 'Designation',
			'foreignKey' => 'designation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		), 
        'TransfusionOriginal' => array(
            'className' => 'Transfusion',
            'foreignKey' => 'transfusion_id',
            'dependent' => true,
            'conditions' => array('TransfusionOriginal.copied' => '1'),
        )
	);

	public $hasMany = array(
        'TransfusionFollowup' => array(
            'className' => 'Transfusion',
            'foreignKey' => 'transfusion_id',
            'dependent' => true,
            'conditions' => array('TransfusionFollowup.report_type' => 'Followup'),
        ), 
		'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Transfusion', 'Attachment.group' => 'attachment'),
      	),
		'Pint' => array(
			'className' => 'Pint',
			'foreignKey' => 'transfusion_id',
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
        'ExternalComment' => array(
            'className' => 'Comment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ExternalComment.model' => 'Transfusion', 'ExternalComment.category' => 'external' ),
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
        'gender' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the patient\'s gender'
            ),
        ),
        // 'diagnosis' => array(
        //     'notBlank' => array(
        //         'rule'     => 'notBlank',
        //         'required' => true,
        //         'message'  => 'Please provide the diagnosis'
        //     ),
        // ),
        'designation_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please specify your designation',
            ),
        ),
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
                'message'  => 'Please provide the date of the report'
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

    public function beforeSave($options = array()) {
        if (!empty($this->data['Transfusion']['reporter_date'])) {
            $this->data['Transfusion']['reporter_date'] = $this->dateFormatBeforeSave($this->data['Transfusion']['reporter_date']);
        }
        if (!empty($this->data['Transfusion']['nurse_date'])) {
            $this->data['Transfusion']['nurse_date'] = $this->dateFormatBeforeSave($this->data['Transfusion']['nurse_date']);
        }
        if (!empty($this->data['Transfusion']['reporter_date_diff'])) {
            $this->data['Transfusion']['reporter_date_diff'] = $this->dateFormatBeforeSave($this->data['Transfusion']['reporter_date_diff']);
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['Transfusion']['reporter_date'])) {
                $results[$key]['Transfusion']['reporter_date'] = $this->dateFormatAfterFind($val['Transfusion']['reporter_date']);
            }
            if (isset($val['Transfusion']['nurse_date'])) {
                $results[$key]['Transfusion']['nurse_date'] = $this->dateFormatAfterFind($val['Transfusion']['nurse_date']);
            }
            if (isset($val['Transfusion']['reporter_date_diff'])) {
                $results[$key]['Transfusion']['reporter_date_diff'] = $this->dateFormatAfterFind($val['Transfusion']['reporter_date_diff']);
            }
        }
        return $results;
    }
}
