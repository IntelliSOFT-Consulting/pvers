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
}
