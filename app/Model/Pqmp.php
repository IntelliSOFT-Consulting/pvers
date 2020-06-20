<?php
App::uses('AppModel', 'Model');
/**
 * Pqmp Model
 *
 * @property User $User
 * @property Attachment $Attachment
 */
class Pqmp extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'brand_name', 'type' => 'like'),
        array('name' => 'id', 'type' => 'like'),
        array('name' => 'submitted', 'type' => 'value'),
        array('name' => 'submit', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
        array('name' => 'device', 'type' => 'value'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Pqmp.created BETWEEN ? AND ?'),
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
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
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
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Pqmp', 'Attachment.group' => 'attachment'),
      	),
	);

	public $validate = array(
		'complaint' => array(
            'atLeastOne' => array(
                'rule'     => 'atLeastOne',
                'required' => true,
                'message'  => 'Please tick at least one complaint'
            ),
        ),
		'brand_name' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the brand name of the product'
            ),
		),
		'name_of_manufacturer' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the manufacturer'
            ),
		),
		'manufacture_date' => array(
			'yearMust' => array(
                'rule'     => 'yearMust',
                'required' => true,
                'message'  => 'Please provide at least the date \ year of manufacture'
            ),
		),
		'expiry_date' => array(
			'exceedManufacture' => array(
                'rule'     => 'exceedManufacture',
                'message'  => 'The expiry date must be greater than the date of manufacture'
            ),
		),
		// 'receipt_date' => array(
		// 	'notBlank' => array(
  //               'rule'     => 'notBlank',
  //               'required' => true,
  //               'message'  => 'Please provide date of receipt'
  //           ),
		// ),
		'product_formulation' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please select an option for product formulation'
            ),
		),
		'complaint_description' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please describe the complaint in detail'
            ),
		),
		'reporter_name' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
		),
		'contact_number' => array(
			'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a contact number'
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
		return $this->data['Pqmp']['colour_change'] + $this->data['Pqmp']['separating'] + $this->data['Pqmp']['caking'] + $this->data['Pqmp']['powdering'] +
				$this->data['Pqmp']['moulding'] +  $this->data['Pqmp']['odour_change'] + $this->data['Pqmp']['mislabeling'] +
				$this->data['Pqmp']['incomplete_pack'] + $this->data['Pqmp']['complaint_other'] > 0;
	}

	public function yearMust($field = null) {
		if(!empty($field['manufacture_date']['day']) || !empty($field['manufacture_date']['month'])){
			return !empty($field['manufacture_date']['year']);
		}
		return true;
	}

	public function exceedManufacture($field = null) {
		if(!empty($this->data['Pqmp']['manufacture_date']['day']) && !empty($this->data['Pqmp']['manufacture_date']['month'])
			&& !empty($this->data['Pqmp']['manufacture_date']['year'])) {
				return strtotime(implode('-', $this->data['Pqmp']['manufacture_date'])) <= strtotime($field['expiry_date']);
		}  else {
			return $this->data['Pqmp']['manufacture_date']['year'] <= date('Y', strtotime($field['expiry_date']));
		}

		// if(!empty($field['expiry_date']) && !empty($this->data['Pqmp']['manufacture_date']['year'])) {
			// return date('Y', strtotime($field['expiry_date'])) >= $this->data['Pqmp']['manufacture_date']['year'];
		// }
		return true;
	}

	public function beforeSave($options = array()) {
		// if (!empty($this->data['Pqmp']['manufacture_date'])) {
			// $this->data['Pqmp']['manufacture_date'] = $this->dateFormatBeforeSave($this->data['Pqmp']['manufacture_date']);
		// }
		if (!empty($this->data['Pqmp']['manufacture_date'])) {
			$this->data['Pqmp']['manufacture_date'] = implode('-', $this->data['Pqmp']['manufacture_date']);
		} else {
			$this->data['Pqmp']['manufacture_date'] = '';
		}
		if (!empty($this->data['Pqmp']['expiry_date'])) {
			$this->data['Pqmp']['expiry_date'] = $this->dateFormatBeforeSave($this->data['Pqmp']['expiry_date']);
		}

		if (!empty($this->data['Pqmp']['receipt_date'])) {
			$this->data['Pqmp']['receipt_date'] = $this->dateFormatBeforeSave($this->data['Pqmp']['receipt_date']);
		}
		return true;
	}

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (!empty($val['Pqmp']['manufacture_date'])) {
				if(empty($val['Pqmp']['manufacture_date'])) $val['Pqmp']['manufacture_date'] = '--';
				$b = explode('-', $val['Pqmp']['manufacture_date']);
				$results[$key]['Pqmp']['manufacture_date'] = array('day'=> $b[0],'month'=> $b[1],'year'=> $b[2]);
			}
			if (isset($val['Pqmp']['expiry_date'])) {
				$results[$key]['Pqmp']['expiry_date'] = $this->dateFormatAfterFind($val['Pqmp']['expiry_date']);
			}
			if (isset($val['Pqmp']['receipt_date'])) {
				$results[$key]['Pqmp']['receipt_date'] = $this->dateFormatAfterFind($val['Pqmp']['receipt_date']);
			}

		}
		return $results;
	}

}
