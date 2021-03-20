<?php
App::uses('Reminder', 'Model');

/**
 * Reminder Test Case
 */
class ReminderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reminder',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sadr',
		'app.sub_county',
		'app.sadr_list_of_drug',
		'app.dose',
		'app.route',
		'app.frequency',
		'app.attachment',
		'app.sadr_list_of_medicine',
		'app.country',
		'app.notification',
		'app.feedback',
		'app.aefi',
		'app.aefi_list_of_vaccine',
		'app.device',
		'app.list_of_device',
		'app.medication',
		'app.medication_product',
		'app.padr',
		'app.padr_list_of_medicine',
		'app.transfusion',
		'app.pint'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reminder = ClassRegistry::init('Reminder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reminder);

		parent::tearDown();
	}

}
