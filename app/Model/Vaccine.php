<?php
App::uses('AppModel', 'Model');
/**
 * Vaccine Model
 *
 * @property Aefi $Aefi
 */
class Vaccine extends AppModel {
	public $displayField = 'vaccine_name';

	public $actsAs = array('Utils.SoftDelete', 'Containable');

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	
}
