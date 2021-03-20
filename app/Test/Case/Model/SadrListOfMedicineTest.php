<?php
App::uses('SadrListOfMedicine', 'Model');

/**
 * SadrListOfMedicine Test Case
 */
class SadrListOfMedicineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sadr_list_of_medicine',
		'app.sadr',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sub_county',
		'app.country',
		'app.attachment',
		'app.sadr_followup',
		'app.sadr_list_of_drug',
		'app.dose',
		'app.route',
		'app.frequency',
		'app.notification',
		'app.feedback',
		'app.aefi',
		'app.aefi_list_of_vaccine',
		'app.device',
		'app.list_of_device',
		'app.medication',
		'app.medication_product',
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
		$this->SadrListOfMedicine = ClassRegistry::init('SadrListOfMedicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrListOfMedicine);

		parent::tearDown();
	}

}
