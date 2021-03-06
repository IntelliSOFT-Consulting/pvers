<?php
/**
 * Device Fixture
 */
class DeviceFixture extends CakeTestFixture {

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
		'report_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name_of_institution' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'institution_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'institution_address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'institution_contact' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pregnancy_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 55, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'trimester' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 75, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ip_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_of_birth' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'age_years' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'allergy' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'allergy_specify' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'problem_noted' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'brand_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'serial_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'commmon_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'catalogue' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacturer_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacturer_address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacture_date' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'expiry_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'operator' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'operator_specify' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'device_usage' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'device_duration_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'device_duration' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'device_availability' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'device_unavailability' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'implant_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'explant_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'implant_duration_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'implant_duration' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'specimen_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patients_involved' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tests_done' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'false_positives' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'false_negatives' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'true_positives' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'true_negatives' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'date_onset_incident' => array('type' => 'date', 'null' => true, 'default' => null),
		'serious' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'serious_yes' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'death_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'description_of_reaction' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'remedial_action' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'outcome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'report_type' => 'Lorem ipsum dolor ',
			'name_of_institution' => 'Lorem ipsum dolor sit amet',
			'institution_code' => 'Lorem ipsum dolor sit amet',
			'institution_address' => 'Lorem ipsum dolor sit amet',
			'institution_contact' => 'Lorem ipsum dolor sit amet',
			'patient_name' => 'Lorem ipsum dolor sit amet',
			'patient_address' => 'Lorem ipsum dolor sit amet',
			'patient_phone' => 'Lorem ipsum dolor sit amet',
			'pregnancy_status' => 'Lorem ipsum dolor sit amet',
			'trimester' => 'Lorem ipsum dolor sit amet',
			'ip_no' => 'Lorem ipsum dolor sit amet',
			'date_of_birth' => 'Lorem ipsum dolor ',
			'age_years' => 1,
			'allergy' => 'Lorem ipsum dolor sit amet',
			'allergy_specify' => 'Lorem ipsum dolor sit amet',
			'problem_noted' => 'Lorem ipsum dolor sit a',
			'brand_name' => 'Lorem ipsum dolor sit amet',
			'serial_no' => 'Lorem ipsum dolor sit amet',
			'commmon_name' => 'Lorem ipsum dolor sit amet',
			'catalogue' => 'Lorem ipsum dolor sit amet',
			'manufacturer_name' => 'Lorem ipsum dolor sit amet',
			'manufacturer_address' => 'Lorem ipsum dolor sit amet',
			'manufacture_date' => 'Lorem ipsum dolor sit amet',
			'expiry_date' => '2020-05-16',
			'operator' => 'Lorem ipsum dolor sit amet',
			'operator_specify' => 'Lorem ipsum dolor sit amet',
			'device_usage' => 'Lorem ipsum dolor sit amet',
			'device_duration_type' => 'Lorem ipsum dolor sit amet',
			'device_duration' => 1,
			'device_availability' => 'Lorem ipsum dolor sit a',
			'device_unavailability' => 'Lorem ipsum dolor sit amet',
			'implant_date' => '2020-05-16',
			'explant_date' => '2020-05-16',
			'implant_duration_type' => 'Lorem ipsum dolor sit amet',
			'implant_duration' => 1,
			'specimen_type' => 'Lorem ipsum dolor sit a',
			'patients_involved' => 1,
			'tests_done' => 1,
			'false_positives' => 1,
			'false_negatives' => 1,
			'true_positives' => 1,
			'true_negatives' => 1,
			'date_onset_incident' => '2020-05-16',
			'serious' => 'Lorem ip',
			'serious_yes' => 'Lorem ipsum dolor sit amet',
			'death_date' => '2020-05-16',
			'description_of_reaction' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'remedial_action' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'outcome' => 'Lorem ipsum dolor sit amet',
			'reporter_name' => 'Lorem ipsum dolor sit amet',
			'reporter_email' => 'Lorem ipsum dolor sit amet',
			'reporter_phone' => 'Lorem ipsum dolor sit amet',
			'submitted' => 1,
			'active' => 1,
			'created' => '2020-05-16 14:20:50',
			'modified' => '2020-05-16 14:20:50'
		),
	);

}
