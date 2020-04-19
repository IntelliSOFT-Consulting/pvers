<?php
/**
 * AefiListOfVaccine Fixture
 */
class AefiListOfVaccineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'aefi_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'saefi_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'vaccine_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'vaccination_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'vaccination_time' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dosage' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'batch_number' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'expiry_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'diluent_batch_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 55, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'diluent_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'diluent_expiry_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'suspected_drug' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'aefi_id' => 1,
			'saefi_id' => 1,
			'vaccine_name' => 'Lorem ipsum dolor sit amet',
			'vaccination_date' => '2020-04-18',
			'vaccination_time' => 'Lorem ipsum d',
			'dosage' => 'Lorem ipsum dolor sit amet',
			'batch_number' => 'Lorem ipsum dolor sit amet',
			'expiry_date' => '2020-04-18',
			'diluent_batch_number' => 'Lorem ipsum dolor sit amet',
			'diluent_date' => '2020-04-18 13:35:38',
			'diluent_expiry_date' => '2020-04-18',
			'suspected_drug' => 1,
			'created' => '2020-04-18 13:35:38',
			'modified' => '2020-04-18 13:35:38'
		),
	);

}
