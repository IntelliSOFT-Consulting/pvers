<?php
App::uses('AppModel', 'Model');
/**
 * Sae Model
 *
 * @property Application $Application
 * @property Sae $Sae
 * @property User $User
 * @property Country $Country
 * @property ConcomittantDrug $ConcomittantDrug
 * @property Sae $Sae
 * @property SuspectedDrug $SuspectedDrug
 */
class Sae extends AppModel {

    public $actsAs = array('Containable', 'Search.Searchable');
    public $filterArgs = array(
            'reference_no' => array('type' => 'like', 'encode' => true),
            'protocol_no' => array('type' => 'like', 'encode' => true),
            'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Sae.created BETWEEN ? AND ?'),
        );
    public function makeRangeCondition($data = array()) {
            if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
            else $start_date = date('Y-m-d', strtotime('2012-05-01'));

            if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
            else $end_date = date('Y-m-d');

            return array($start_date, $end_date);
    }
    //The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * Validation rules
 *
 * @var array
 */
	

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
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
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
		'ConcomittantDrug' => array(
			'className' => 'ConcomittantDrug',
			'foreignKey' => 'sae_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SuspectedDrug' => array(
			'className' => 'SuspectedDrug',
			'foreignKey' => 'sae_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		), 
        'SaeFollowup' => array(
            'className' => 'Sae',
            'foreignKey' => 'sae_id',
            'dependent' => true,
            'conditions' => array('SaeFollowup.report_type' => 'Followup'),
        )
	);

	public function beforeSave($options = array()) {
        if (!empty($this->data['Sae']['date_of_birth'])) {
            $this->data['Sae']['date_of_birth'] = $this->dateFormatBeforeSave($this->data['Sae']['date_of_birth']);
        }
        if (!empty($this->data['Sae']['enrollment_date'])) {
            $this->data['Sae']['enrollment_date'] = $this->dateFormatBeforeSave($this->data['Sae']['enrollment_date']);
        }
        if (!empty($this->data['Sae']['administration_date'])) {
            $this->data['Sae']['administration_date'] = $this->dateFormatBeforeSave($this->data['Sae']['administration_date']);
        }
        if (!empty($this->data['Sae']['latest_date'])) {
            $this->data['Sae']['latest_date'] = $this->dateFormatBeforeSave($this->data['Sae']['latest_date']);
        }
        if (!empty($this->data['Sae']['reaction_onset'])) {
            $this->data['Sae']['reaction_onset'] = $this->dateFormatBeforeSave($this->data['Sae']['reaction_onset']);
        }
        if (!empty($this->data['Sae']['reaction_end_date'])) {
            $this->data['Sae']['reaction_end_date'] = $this->dateFormatBeforeSave($this->data['Sae']['reaction_end_date']);
        }
        if (!empty($this->data['Sae']['manufacturer_date'])) {
            $this->data['Sae']['manufacturer_date'] = $this->dateFormatBeforeSave($this->data['Sae']['manufacturer_date']);
        }
        return true;
    }

    function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['Sae']['date_of_birth'])) {
                $results[$key]['Sae']['date_of_birth'] = $this->dateFormatAfterFind($val['Sae']['date_of_birth']);
            }
            if (isset($val['Sae']['enrollment_date'])) {
                $results[$key]['Sae']['enrollment_date'] = $this->dateFormatAfterFind($val['Sae']['enrollment_date']);
            }
            if (isset($val['Sae']['administration_date'])) {
                $results[$key]['Sae']['administration_date'] = $this->dateFormatAfterFind($val['Sae']['administration_date']);
            }
            if (isset($val['Sae']['latest_date'])) {
                $results[$key]['Sae']['latest_date'] = $this->dateFormatAfterFind($val['Sae']['latest_date']);
            }
            if (isset($val['Sae']['reaction_onset'])) {
                $results[$key]['Sae']['reaction_onset'] = $this->dateFormatAfterFind($val['Sae']['reaction_onset']);
            }
            if (isset($val['Sae']['reaction_end_date'])) {
                $results[$key]['Sae']['reaction_end_date'] = $this->dateFormatAfterFind($val['Sae']['reaction_end_date']);
            }
            if (isset($val['Sae']['manufacturer_date'])) {
                $results[$key]['Sae']['manufacturer_date'] = $this->dateFormatAfterFind($val['Sae']['manufacturer_date']);
            }
        }
        return $results;
    }
}
