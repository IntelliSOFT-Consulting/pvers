<?php
/**
 * SadrKnownAllergyFixture
 *
 */
class SadrKnownAllergyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'sadr_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'known_allergy_specify' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'sadr_id' => 1,
			'known_allergy_specify' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-15 09:38:04',
			'modified' => '2012-05-15 09:38:04'
		),
	);
}
