<?php
App::uses('SuspectedDrug', 'Model');

/**
 * SuspectedDrug Test Case
 */
class SuspectedDrugTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.suspected_drug',
		'app.sae',
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
		'app.reminder',
		'app.device',
		'app.list_of_device',
		'app.medication',
		'app.medication_product',
		'app.padr',
		'app.padr_list_of_medicine',
		'app.transfusion',
		'app.pint',
		'app.concomittant_drug'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SuspectedDrug = ClassRegistry::init('SuspectedDrug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SuspectedDrug);

		parent::tearDown();
	}

}
