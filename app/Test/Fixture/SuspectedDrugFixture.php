<?php
/**
 * SuspectedDrug Fixture
 */
class SuspectedDrugFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'sae_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'generic_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dose' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'route_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indication' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_from' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_to' => array('type' => 'date', 'null' => true, 'default' => null),
		'therapy_duration' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reaction_abate' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reaction_reappear' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'deleted_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
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
			'sae_id' => 1,
			'generic_name' => 'Lorem ipsum dolor sit amet',
			'dose' => 'Lorem ipsum dolor sit amet',
			'route_id' => 1,
			'indication' => 'Lorem ipsum dolor sit amet',
			'date_from' => '2020-07-04',
			'date_to' => '2020-07-04',
			'therapy_duration' => 'Lorem ipsum dolor sit amet',
			'reaction_abate' => 'Lorem ipsum dolor sit amet',
			'reaction_reappear' => 'Lorem ipsum dolor sit amet',
			'deleted' => 1,
			'deleted_date' => '2020-07-04 19:29:23',
			'created' => '2020-07-04 19:29:23',
			'modified' => '2020-07-04 19:29:23'
		),
	);

}
