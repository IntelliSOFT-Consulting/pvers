<?php
App::uses('PqmpProductFormulation', 'Model');

/**
 * PqmpProductFormulation Test Case
 *
 */
class PqmpProductFormulationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.pqmp_product_formulation', 'app.pqmp', 'app.user', 'app.group', 'app.sadr', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.pqmp_complaint', 'app.pqmp_storage_condition');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PqmpProductFormulation = ClassRegistry::init('PqmpProductFormulation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PqmpProductFormulation);

		parent::tearDown();
	}

}
