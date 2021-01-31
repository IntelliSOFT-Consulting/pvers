<?php
App::uses('Vaccine', 'Model');

/**
 * Vaccine Test Case
 */
class VaccineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vaccine',
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
		'app.aefi_list_of_vaccine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vaccine = ClassRegistry::init('Vaccine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vaccine);

		parent::tearDown();
	}

}
