<?php
App::uses('Designation', 'Model');

/**
 * Designation Test Case
 *
 */
class DesignationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.designation', 'app.pqmp', 'app.user', 'app.group', 'app.sadr', 'app.county', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.pqmp_complaint', 'app.pqmp_product_formulation', 'app.pqmp_storage_condition');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Designation = ClassRegistry::init('Designation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Designation);

		parent::tearDown();
	}

}
