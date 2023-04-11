<?php
App::uses('AppModel', 'Model');
/**
 * Pqmp Model
 *
 * @property User $User
 * @property Attachment $Attachment
 */
class Pqmp extends AppModel
{

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $actsAs = array('Search.Searchable', 'Containable');
    public $filterArgs = array(
        'reference_no' => array('type' => 'like', 'encode' => true),
        'brand_name' => array('type' => 'like', 'encode' => true),
        'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Pqmp.reporter_date BETWEEN ? AND ?'),
        'start_date' => array('type' => 'query', 'method' => 'dummy'),
        'end_date' => array('type' => 'query', 'method' => 'dummy'),
        'facility_name' => array('type' => 'like', 'encode' => true),
        'supplier_name' => array('type' => 'like', 'encode' => true),
        'county_id' => array('type' => 'value'),
        'country_id' => array('type' => 'value'),
        'generic_name' => array('type' => 'like', 'encode' => true),
        'health_program' => array('type' => 'query', 'method' => 'findByHealthProgram', 'encode' => true),
        'name_of_manufacturer' => array('type' => 'like', 'encode' => true),
        'medicinal_product' => array('type' => 'value'),
        'blood_products' => array('type' => 'value'),
        'product_vaccine' => array('type' => 'value'),
        'herbal_product' => array('type' => 'value'),
        'medical_device' => array('type' => 'value'),
        'cosmeceuticals' => array('type' => 'value'),
        'product_other' => array('type' => 'value'),
        'product_specify' => array('type' => 'like', 'encode' => true),
        'product_formulation' => array('type' => 'value'),
        'colour_change' => array('type' => 'value'),
        'separating' => array('type' => 'value'),
        'powdering' => array('type' => 'value'),
        'caking' => array('type' => 'value'),
        'moulding' => array('type' => 'value'),
        'odour_change' => array('type' => 'value'),
        'mislabeling' => array('type' => 'value'),
        'incomplete_pack' => array('type' => 'value'),
        'therapeutic_ineffectiveness' => array('type' => 'value'),
        'particulate_matter' => array('type' => 'value'),
        'complaint_other' => array('type' => 'value'),
        'packaging' => array('type' => 'value'),
        'labelling' => array('type' => 'value'),
        'sampling' => array('type' => 'value'),
        'mechanism' => array('type' => 'value'),
        'electrical' => array('type' => 'value'),
        'device_data' => array('type' => 'value'),
        'software' => array('type' => 'value'),
        'environmental' => array('type' => 'value'),
        'results' => array('type' => 'value'),
        'readings' => array('type' => 'value'),
        'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
        'designation_id' => array('type' => 'value'),
        'submitted' => array('type' => 'value'),
        'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
    );

    public function dummy($data = array())
    {
        return array('1' => '1');
    }

    public function findByHealthProgram($data = array())
    {
        $vdrugs = ClassRegistry::init('DrugDictionary')->find('list', array('conditions' => array('health_program' => $data['health_program']), 'fields' => array('drug_name', 'drug_name')));
        $cond = array(
            'OR' => array(
                $this->alias . '.brand_name' => $vdrugs,
                $this->alias . '.generic_name' => $vdrugs,
            )
        );
        return $cond;
    }

    public function reporterFilter($data = array())
    {
        $filter = $data['reporter'];
        $cond = array(
            'OR' => array(
                $this->alias . '.reporter_name LIKE' => '%' . $filter . '%',
                $this->alias . '.reporter_email LIKE' => '%' . $filter . '%',
            )
        );
        return $cond;
    }

    public function orConditions($data = array())
    {
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

    public function makeRangeCondition($data = array())
    {
        if (!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
        else $start_date = date('Y-m-d', strtotime('2012-05-01'));

        if (!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
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
        ),
        'PqmpOriginal' => array(
            'className' => 'Pqmp',
            'foreignKey' => 'pqmp_id',
            'dependent' => true,
            'conditions' => array('PqmpOriginal.copied' => '1'),
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
        'ExternalComment' => array(
            'className' => 'Comment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ExternalComment.model' => 'Pqmp', 'ExternalComment.category' => 'external'),
        )
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
        'batch_number' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the batch number of the product'
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
        'adverse_reaction' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please select if advers reaction'
            ),
        ),
        'medication_error' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please select if medication error'
            ),
        ),
        'reporter_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a name'
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
        'reporter_phone' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide phone number'
            ),
        ),
        //ensure reporter phone is numeric and 10 digits
        'reporter_phone' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please provide a valid phone number',
            ),
            'minLength' => array(
                'rule' => array('minLength', 10),
                'message' => 'Please provide a valid phone number',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 10),
                'message' => 'Please provide a valid phone number',
            ),
        ),
    );

    public function atLeastOne($field = null)
    {
        return $this->data['Pqmp']['colour_change'] + $this->data['Pqmp']['separating'] + $this->data['Pqmp']['caking'] + $this->data['Pqmp']['powdering'] +
            $this->data['Pqmp']['moulding'] +  $this->data['Pqmp']['odour_change'] + $this->data['Pqmp']['mislabeling'] +
            $this->data['Pqmp']['incomplete_pack'] + $this->data['Pqmp']['complaint_other'] + $this->data['Pqmp']['therapeutic_ineffectiveness'] + $this->data['Pqmp']['particulate_matter'] > 0;
    }

    public function yearMust($field = null)
    {
        if (!empty($field['manufacture_date']['day']) || !empty($field['manufacture_date']['month'])) {
            return !empty($field['manufacture_date']['year']);
        }
        return true;
    }

    public function exceedManufacture($field = null)
    {
        if (
            !empty($this->data['Pqmp']['manufacture_date']['day']) && !empty($this->data['Pqmp']['manufacture_date']['month'])
            && !empty($this->data['Pqmp']['manufacture_date']['year'])
        ) {
            return strtotime(implode('-', $this->data['Pqmp']['manufacture_date'])) <= strtotime($field['expiry_date']);
        } else {
            return $this->data['Pqmp']['manufacture_date']['year'] <= date('Y', strtotime($field['expiry_date']));
        }

        // if(!empty($field['expiry_date']) && !empty($this->data['Pqmp']['manufacture_date']['year'])) {
        // return date('Y', strtotime($field['expiry_date'])) >= $this->data['Pqmp']['manufacture_date']['year'];
        // }
        return true;
    }

    public function beforeSave($options = array())
    {
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
        if (!empty($this->data['Pqmp']['reporter_date'])) {
            $this->data['Pqmp']['reporter_date'] = $this->dateFormatBeforeSave($this->data['Pqmp']['reporter_date']);
        }
        if (!empty($this->data['Pqmp']['reporter_date_diff'])) {
            $this->data['Pqmp']['reporter_date_diff'] = $this->dateFormatBeforeSave($this->data['Pqmp']['reporter_date_diff']);
        }
        return true;
    }

    function afterFind($results, $primary = false)
    {
        foreach ($results as $key => $val) {
            if (!empty($val['Pqmp']['manufacture_date'])) {
                if (empty($val['Pqmp']['manufacture_date'])) $val['Pqmp']['manufacture_date'] = '--';
                $b = explode('-', $val['Pqmp']['manufacture_date']);
                $results[$key]['Pqmp']['manufacture_date'] = array('day' => $b[0], 'month' => $b[1], 'year' => $b[2]);
            }
            if (isset($val['Pqmp']['expiry_date'])) {
                $results[$key]['Pqmp']['expiry_date'] = $this->dateFormatAfterFind($val['Pqmp']['expiry_date']);
            }
            if (isset($val['Pqmp']['receipt_date'])) {
                $results[$key]['Pqmp']['receipt_date'] = $this->dateFormatAfterFind($val['Pqmp']['receipt_date']);
            }
            if (isset($val['Pqmp']['reporter_date'])) {
                $results[$key]['Pqmp']['reporter_date'] = $this->dateFormatAfterFind($val['Pqmp']['reporter_date']);
            }
            if (isset($val['Pqmp']['reporter_date_diff'])) {
                $results[$key]['Pqmp']['reporter_date_diff'] = $this->dateFormatAfterFind($val['Pqmp']['reporter_date_diff']);
            }
        }
        return $results;
    }
}
