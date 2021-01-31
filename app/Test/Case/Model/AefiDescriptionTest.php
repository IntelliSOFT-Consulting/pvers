<?php
App::uses('AefiDescription', 'Model');

/**
 * AefiDescription Test Case
 */
class AefiDescriptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aefi_description',
		'app.aefi',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sadr',
		'app.sub_county',
		'app.padr',
		'app.padr_list_of_medicine',
		'app.attachment',
		'app.sadr_list_of_drug',
		'app.sadr_followup',
		'app.dose',
		'app.route',
		'app.frequency',
		'app.sadr_list_of_medicine',
		'app.reminder',
		'app.comment',
		'app.country',
		'app.notification',
		'app.feedback',
		'app.device',
		'app.list_of_device',
		'app.medication',
		'app.medication_product',
		'app.transfusion',
		'app.pint',
		'app.sae',
		'app.concomittant_drug',
		'app.suspected_drug',
		'app.aefi_list_of_vaccine',
		'app.vaccine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AefiDescription = ClassRegistry::init('AefiDescription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AefiDescription);

		parent::tearDown();
	}

}
