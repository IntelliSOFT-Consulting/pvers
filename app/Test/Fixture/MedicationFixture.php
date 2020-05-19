<?php
/**
 * Medication Fixture
 */
class MedicationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'reference_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'county_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'designation_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'date_of_event' => array('type' => 'date', 'null' => true, 'default' => null),
		'time_of_event' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name_of_institution' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'institution_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'institution_contact' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_of_birth' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'age_years' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ward' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'clinic' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pharmacy' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'accident' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'location_other' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description_of_error' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'process_occur' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 95, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reach_patient' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'correct_medication' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'direct_result' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'outcome' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'outcome_error' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'outcome_death' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'staff_factors' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'medication_related' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'work_environment' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'task_technology' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'task_other' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'recommendations' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reporter_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'submitted' => array('type' => 'tinyinteger', 'null' => true, 'default' => '0', 'length' => 2, 'unsigned' => false),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
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
			'user_id' => 1,
			'reference_no' => 'Lorem ipsum dolor sit amet',
			'county_id' => 1,
			'designation_id' => 1,
			'date_of_event' => '2020-05-18',
			'time_of_event' => 'Lorem ip',
			'name_of_institution' => 'Lorem ipsum dolor sit amet',
			'institution_code' => 'Lorem ipsum dolor sit amet',
			'institution_contact' => 'Lorem ipsum dolor sit amet',
			'patient_name' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ip',
			'patient_phone' => 'Lorem ipsum dolor sit amet',
			'date_of_birth' => 'Lorem ipsum dolor ',
			'age_years' => 1,
			'ward' => 'Lorem ipsum dolor sit amet',
			'clinic' => 'Lorem ipsum dolor sit amet',
			'pharmacy' => 'Lorem ipsum dolor sit amet',
			'accident' => 'Lorem ipsum dolor sit amet',
			'location_other' => 'Lorem ipsum dolor sit amet',
			'description_of_error' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'process_occur' => 'Lorem ipsum dolor sit amet',
			'reach_patient' => 'Lorem ipsum dolor sit a',
			'correct_medication' => 'Lorem ipsum dolor sit a',
			'direct_result' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'outcome' => 'Lorem ipsum dolor sit amet',
			'outcome_error' => 'Lorem ipsum dolor sit amet',
			'outcome_death' => 'Lorem ipsum dolor sit amet',
			'staff_factors' => 'Lorem ipsum dolor sit amet',
			'medication_related' => 'Lorem ipsum dolor sit amet',
			'work_environment' => 'Lorem ipsum dolor sit amet',
			'task_technology' => 'Lorem ipsum dolor sit amet',
			'task_other' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'recommendations' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reporter_name' => 'Lorem ipsum dolor sit amet',
			'reporter_email' => 'Lorem ipsum dolor sit amet',
			'reporter_phone' => 'Lorem ipsum dolor sit amet',
			'submitted' => 1,
			'active' => 1,
			'created' => '2020-05-18 21:01:10',
			'modified' => '2020-05-18 21:01:10'
		),
	);

}
