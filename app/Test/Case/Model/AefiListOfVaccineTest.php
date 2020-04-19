<?php
App::uses('AefiListOfVaccine', 'Model');

/**
 * AefiListOfVaccine Test Case
 */
class AefiListOfVaccineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aefi_list_of_vaccine',
		'app.aefi',
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
		'app.country',
		'app.saefi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AefiListOfVaccine = ClassRegistry::init('AefiListOfVaccine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AefiListOfVaccine);

		parent::tearDown();
	}

}
