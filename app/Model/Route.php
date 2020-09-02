<?php
App::uses('AppModel', 'Model');
/**
 * Route Model
 *
 */
class Route extends AppModel {
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'value', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
    );

	public $validate = array(
		'icsr_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a value'
            ),
        ),
		'name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
        ),
	);
}
