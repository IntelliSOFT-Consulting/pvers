<?php
/**
 * Sae Fixture
 */
class SaeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'application_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sae_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'reference_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'form_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'patient_initials' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'date_of_birth' => array('type' => 'date', 'null' => true, 'default' => null),
		'age_years' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'causality' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'enrollment_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'administration_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'latest_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'reaction_onset' => array('type' => 'date', 'null' => true, 'default' => null),
		'reaction_end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'patient_died' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'prolonged_hospitalization' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'incapacity' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'life_threatening' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'reaction_other' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'reaction_description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'relevant_history' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacturer_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mfr_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacturer_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'source_study' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'source_literature' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'source_health_professional' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'report_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'report_type' => array('type' => 'string', 'null' => true, 'default' => 'Initial', 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'approved' => array('type' => 'tinyinteger', 'null' => true, 'default' => '0', 'length' => 2, 'unsigned' => false),
		'approved_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'email_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'application_id' => 1,
			'sae_id' => 1,
			'reference_no' => 'Lorem ipsum dolor sit amet',
			'form_type' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'patient_initials' => 'Lorem ipsum dolor sit amet',
			'country_id' => 1,
			'date_of_birth' => '2020-07-04',
			'age_years' => 1,
			'gender' => 'Lorem ipsum dolor sit a',
			'causality' => 'Lorem ipsum dolor sit amet',
			'enrollment_date' => '2020-07-04',
			'administration_date' => '2020-07-04',
			'latest_date' => '2020-07-04',
			'reaction_onset' => '2020-07-04',
			'reaction_end_date' => '2020-07-04',
			'patient_died' => 1,
			'prolonged_hospitalization' => 1,
			'incapacity' => 1,
			'life_threatening' => 1,
			'reaction_other' => 1,
			'reaction_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'relevant_history' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'manufacturer_name' => 'Lorem ipsum dolor sit amet',
			'mfr_no' => 'Lorem ipsum dolor sit amet',
			'manufacturer_date' => '2020-07-04',
			'source_study' => 1,
			'source_literature' => 1,
			'source_health_professional' => 1,
			'report_date' => '2020-07-04',
			'report_type' => 'Lorem ipsum dolor sit amet',
			'approved' => 1,
			'approved_by' => 1,
			'email_address' => 'Lorem ipsum dolor sit amet',
			'reporter_name' => 'Lorem ipsum dolor sit amet',
			'reporter_phone' => 'Lorem ipsum dolor sit amet',
			'reporter_email' => 'Lorem ipsum dolor sit amet',
			'deleted' => 1,
			'deleted_date' => '2020-07-04 19:28:00',
			'created' => '2020-07-04 19:28:00',
			'modified' => '2020-07-04 19:28:00'
		),
	);

}
