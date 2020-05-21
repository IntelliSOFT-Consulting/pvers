<?php
App::uses('MedicationProduct', 'Model');

/**
 * MedicationProduct Test Case
 */
class MedicationProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medication_product',
		'app.medication',
		'app.user',
		'app.group',
		'app.designation',
		'app.pqmp',
		'app.county',
		'app.sadr',
		'app.sub_county',
		'app.attachment',
		'app.sadr_followup',
		'app.sadr_list_of_drug',
		'app.dose',
		'app.route',
		'app.frequency',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicationProduct = ClassRegistry::init('MedicationProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicationProduct);

		parent::tearDown();
	}

}
