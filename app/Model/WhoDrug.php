<?php
App::uses('AppModel', 'Model');
/**
 * WhoDrug Model
 *
 */
class WhoDrug extends AppModel {
	public $displayField = 'drug_name';
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'drug_name', 'type' => 'like'),
        array('name' => 'id', 'type' => 'value'),
    );

	public $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Med ID Required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'The WHO MED ID is alread in use. Please specify a unique code.'
			),
		),
		'drug_name' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a name'
            ),
        ),
	);
}
