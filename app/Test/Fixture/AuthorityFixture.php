<?php
/**
 * Authority Fixture
 */
class AuthorityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'mah_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 137, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mah_company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 153, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mah_company_address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 261, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mah_company_telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 168, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mah_company_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 109, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'product' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false),
		'master_mah' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'mah_name' => 'Lorem ipsum dolor sit amet',
			'mah_company_name' => 'Lorem ipsum dolor sit amet',
			'mah_company_address' => 'Lorem ipsum dolor sit amet',
			'mah_company_telephone' => 'Lorem ipsum dolor sit amet',
			'mah_company_email' => 'Lorem ipsum dolor sit amet',
			'product' => 1,
			'master_mah' => 'Lo'
		),
	);

}
