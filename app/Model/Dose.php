<?php
App::uses('AppModel', 'Model');
/**
 * Dose Model
 *
 */
class Dose extends AppModel {
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'value', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
    );
	
	public $validate = array(
		'icsr_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'ICSR CODE Required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'The icsr code is alread in use. Please specify a unique code.'
			),
		),
		'value' => array(
            'notEmpty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please provide a value'
            ),
        ),
		'name' => array(
            'notEmpty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
        ),
	);
}
