<?php
App::uses('PqmpStorageCondition', 'Model');

/**
 * PqmpStorageCondition Test Case
 *
 */
class PqmpStorageConditionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.pqmp_storage_condition', 'app.pqmp', 'app.user', 'app.group', 'app.sadr', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.pqmp_complaint', 'app.pqmp_product_formulation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PqmpStorageCondition = ClassRegistry::init('PqmpStorageCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PqmpStorageCondition);

		parent::tearDown();
	}

}
