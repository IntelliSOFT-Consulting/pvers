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
    );

    public function beforeSave($options = array()) {
		if (!empty($this->data['Aefi']['date_of_birth'])) {
			$this->data['Aefi']['date_of_birth'] = implode('-', $this->data['Aefi']['date_of_birth']);
		} else {
			$this->data['Aefi']['date_of_birth'] = '';
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
