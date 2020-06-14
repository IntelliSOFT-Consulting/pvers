<?php
App::uses('PadrListOfMedicine', 'Model');

/**
 * PadrListOfMedicine Test Case
 */
class PadrListOfMedicineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.padr_list_of_medicine',
		'app.padr',
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
		'app.pint',
		'app.sadr_list_of_medicine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PadrListOfMedicine = ClassRegistry::init('PadrListOfMedicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PadrListOfMedicine);

		parent::tearDown();
	}

}
