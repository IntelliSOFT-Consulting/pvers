<?php
App::uses('AppModel', 'Model');
/**
 * Device Model
 *
 * @property User $User
 * @property County $County
 * @property Designation $Designation
 */
class Device extends AppModel
{
    public $actsAs = array('Search.Searchable', 'Containable');


    public $filterArgs = array(
        'reference_no' => array('type' => 'like', 'encode' => true),
        'brand_name' => array('type' => 'query', 'method' => 'findByBrandName', 'encode' => true),
        'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Device.reporter_date BETWEEN ? AND ?'),
        'start_date' => array('type' => 'query', 'method' => 'dummy'),
        'end_date' => array('type' => 'query', 'method' => 'dummy'),
        'name_of_institution' => array('type' => 'like', 'encode' => true),
        'report_title' => array('type' => 'like', 'encode' => true),
        'county_id' => array('type' => 'value'),
        'problem_noted' => array('type' => 'value'),
        'serious' => array('type' => 'value'),
        'serious_yes' => array('type' => 'value'),
        'outcome' => array('type' => 'value'),
        'operator' => array('type' => 'value'),
        'device_usage' => array('type' => 'value'),
        'common_name' => array('type' => 'like', 'encode' => true),
        'manufacturer_name' => array('type' => 'like', 'encode' => true),
        'patient_name' => array('type' => 'like', 'encode' => true),
        'report_type' => array('type' => 'value'),
        'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
        'designation_id' => array('type' => 'value'),
        'gender' => array('type' => 'value'),
        'submitted' => array('type' => 'value'),
        'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
    );

    public function dummy($data = array())
    {
        return array('1' => '1');
    }

    public function findByBrandName($data = array())
    {
        $cond = array(
            'OR' => array(
                $this->alias . '.brand_name LIKE' => '%' . $data['brand_name'] . '%',
                $this->alias . '.common_name LIKE' => '%' . $data['brand_name'] . '%',
                $this->alias . '.id' => $this->ListOfDevice->find('list', array(
                    'conditions' => array(
                        'OR' => array(
                            'ListOfDevice.brand_name LIKE' => '%' . $data['brand_name'] . '%',
                            'ListOfDevice.common_name LIKE' => '%' . $data['brand_name'] . '%',
                        )
                    ),
                    'fields' => array('device_id', 'device_id')
                ))
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
        'Designation' => array(
            'className' => 'Designation',
            'foreignKey' => 'designation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'DeviceOriginal' => array(
            'className' => 'Device',
            'foreignKey' => 'device_id',
            'dependent' => true,
            'conditions' => array('DeviceOriginal.copied' => '1'),
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'DeviceFollowup' => array(
            'className' => 'Device',
            'foreignKey' => 'device_id',
            'dependent' => true,
            'conditions' => array('DeviceFollowup.report_type' => 'Followup'),
        ),
        'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachment.model' => 'Device', 'Attachment.group' => 'attachment'),
        ),
        'ListOfDevice' => array(
            'className' => 'ListOfDevice',
            'foreignKey' => 'device_id',
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
            'conditions' => array('ExternalComment.model' => 'Device', 'ExternalComment.category' => 'external'),
        )
    );

    public $validate = array(
        // 'report_title' => array(
        //     'notBlank' => array(
        //         'rule'     => 'notBlank',
        //         'required' => true,
        //         'message'  => 'Please provide a title for the report'
        //     ),
        // ),
        'patient_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a patient\'s name or initials'
            ),
        ),
        'name_of_institution' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the name of the institution'
            ),
        ),
        'gender' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the patient\'s gender'
            ),
        ),
        'brand_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the brand name'
            ),
        ),
        'manufacturer_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the manufacturer'
            ),
        ),
        'serial_no' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the serial/lot no.'
            ),
        ),
        'manufacture_date' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the manufacture date'
            ),
        ),
        'expiry_date' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the expiry date'
            ),
        ),
        'date_onset_incident' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the date of onset of the incident'
            ),
        ),
        'serious' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the event classification'
            ),
        ),
        'outcome' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the patient outcome'
            ),
        ),
        'date_of_birth' => array(
            'ageOrDate' => array(
                'rule'     => 'ageOrDate',
                'allowEmpty' => true,
                'message'  => 'Please specify the patient\'s date of birth or age in years'
            ),
        ),
        'county_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please select a county',
            ),
        ),
        'designation_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please specify your designation',
            ),
        ),
        'serious' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please specify the event classification'
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
        'reporter_phone' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide the phone number of the reporter'
            ),
        ),
        'reporter_email' => array(
            'notBlank' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
        ),  //ensure reporter phone is numeric and 10 digits
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

    public function ageOrDate($field = null)
    {
        return !empty($field['date_of_birth']) || !empty($this->data['Device']['age_years']);
    }

    public function beforeSave($options = array())
    {
        if (!empty($this->data['Device']['explant_date'])) {
            $this->data['Device']['explant_date'] = $this->dateFormatBeforeSave($this->data['Device']['explant_date']);
        }
        if (!empty($this->data['Device']['implant_date'])) {
            $this->data['Device']['implant_date'] = $this->dateFormatBeforeSave($this->data['Device']['implant_date']);
        }
        if (!empty($this->data['Device']['date_onset_incident'])) {
            $this->data['Device']['date_onset_incident'] = $this->dateFormatBeforeSave($this->data['Device']['date_onset_incident']);
        }
        if (!empty($this->data['Device']['death_date'])) {
            $this->data['Device']['death_date'] = $this->dateFormatBeforeSave($this->data['Device']['death_date']);
        }
        if (!empty($this->data['Device']['expiry_date'])) {
            $this->data['Device']['expiry_date'] = $this->dateFormatBeforeSave($this->data['Device']['expiry_date']);
        }
        if (!empty($this->data['Device']['reporter_date'])) {
            $this->data['Device']['reporter_date'] = $this->dateFormatBeforeSave($this->data['Device']['reporter_date']);
        }
        if (!empty($this->data['Device']['reporter_date_diff'])) {
            $this->data['Device']['reporter_date_diff'] = $this->dateFormatBeforeSave($this->data['Device']['reporter_date_diff']);
        }
        return true;
    }

    public function afterFind($results, $primary = false)
    {
        foreach ($results as $key => $val) {
            if (isset($val['Device']['explant_date'])) {
                $results[$key]['Device']['explant_date'] = $this->dateFormatAfterFind($val['Device']['explant_date']);
            }
            if (isset($val['Device']['implant_date'])) {
                $results[$key]['Device']['implant_date'] = $this->dateFormatAfterFind($val['Device']['implant_date']);
            }
            if (isset($val['Device']['date_onset_incident'])) {
                $results[$key]['Device']['date_onset_incident'] = $this->dateFormatAfterFind($val['Device']['date_onset_incident']);
            }
            if (isset($val['Device']['death_date'])) {
                $results[$key]['Device']['death_date'] = $this->dateFormatAfterFind($val['Device']['death_date']);
            }
            if (isset($val['Device']['expiry_date'])) {
                $results[$key]['Device']['expiry_date'] = $this->dateFormatAfterFind($val['Device']['expiry_date']);
            }
            if (isset($val['Device']['reporter_date'])) {
                $results[$key]['Device']['reporter_date'] = $this->dateFormatAfterFind($val['Device']['reporter_date']);
            }
            if (isset($val['Device']['reporter_date_diff'])) {
                $results[$key]['Device']['reporter_date_diff'] = $this->dateFormatAfterFind($val['Device']['reporter_date_diff']);
            }
        }
        return $results;
    }
}
