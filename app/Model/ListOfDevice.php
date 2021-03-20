<?php
App::uses('AppModel', 'Model');
/**
 * ListOfDevice Model
 *
 * @property Device $Device
 */
class ListOfDevice extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Device' => array(
			'className' => 'Device',
			'foreignKey' => 'device_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $validate = array(
		'brand_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the brand name'
			),
		),
		'serial_no' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the serial/lot no.'
			),
		),
		'common_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the common name'
			),
		),
		'manufacturer' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the manufacturer'
			),
		),
		'manufacture_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the date of manufacture'
			),
		),
		'expiry_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the expiry date'
			),
		)
	);
}
