<?php
/**
 * PadrListOfMedicine Fixture
 */
class PadrListOfMedicineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'padr_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'product_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacturer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'expiry_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'start_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifed' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'padr_id' => 1,
			'product_name' => 'Lorem ipsum dolor sit amet',
			'manufacturer' => 'Lorem ipsum dolor sit amet',
			'expiry_date' => '2020-06-14',
			'start_date' => '2020-06-14',
			'end_date' => '2020-06-14',
			'created' => '2020-06-14 20:20:08',
			'modifed' => '2020-06-14 20:20:08'
		),
	);

}
