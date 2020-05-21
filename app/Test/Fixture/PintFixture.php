<?php
/**
 * Pint Fixture
 */
class PintFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transfusion_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'component_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pint_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 55, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'expiry_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'volume_transfused' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 55, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'transfusion_id' => 1,
			'component_type' => 'Lorem ipsum dolor sit amet',
			'pint_no' => 'Lorem ipsum dolor sit amet',
			'expiry_date' => '2020-05-20',
			'volume_transfused' => 'Lorem ipsum dolor sit amet',
			'created' => '2020-05-20 22:41:00',
			'modified' => '2020-05-20 22:41:00'
		),
	);

}
