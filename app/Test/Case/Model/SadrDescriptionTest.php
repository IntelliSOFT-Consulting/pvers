<?php
App::uses('SadrDescription', 'Model');

/**
 * SadrDescription Test Case
 */
class SadrDescriptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sadr_description',
		'app.sadr',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sub_county',
		'app.aefi',
		'app.aefi_description',
		'app.attachment',
		'app.aefi_list_of_vaccine',
		'app.vaccine',
		'app.reminder',
		'app.comment',
		'app.padr',
		'app.padr_list_of_medicine',
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
		'app.route',
		'app.suspected_drug',
		'app.sadr_list_of_drug',
		'app.sadr_followup',
		'app.dose',
		'app.frequency',
		'app.sadr_list_of_medicine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SadrDescription = ClassRegistry::init('SadrDescription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrDescription);

		parent::tearDown();
	}

}
