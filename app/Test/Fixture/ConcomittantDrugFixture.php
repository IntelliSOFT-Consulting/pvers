<?php
/**
 * ConcomittantDrug Fixture
 */
class ConcomittantDrugFixture extends CakeTestFixture {

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
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'deleted' => 1,
			'deleted_date' => '2020-07-04 19:29:12',
			'created' => '2020-07-04 19:29:12',
			'modified' => '2020-07-04 19:29:12'
		),
	);

}
