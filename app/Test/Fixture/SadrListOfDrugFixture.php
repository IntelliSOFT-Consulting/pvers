<?php
/**
 * SadrListOfDrugFixture
 *
 */
class SadrListOfDrugFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'sadr_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'drug_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dose' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'route' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'frequency' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'start_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'stop_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indication' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'suspected_drug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'drug_name' => 'Lorem ipsum dolor sit amet',
			'dose' => 'Lorem ipsum dolor sit amet',
			'route' => 'Lorem ipsum dolor sit amet',
			'frequency' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-05-15',
			'stop_date' => '2012-05-15',
			'indication' => 'Lorem ipsum dolor sit amet',
			'suspected_drug' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-15 09:37:51',
			'modified' => '2012-05-15 09:37:51'
		),
	);
}
