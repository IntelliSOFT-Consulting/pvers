<?php
App::uses('County', 'Model');

/**
 * County Test Case
 *
 */
class CountyTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.county', 'app.sadr', 'app.user', 'app.group', 'app.pqmp', 'app.attachment', 'app.pqmp_complaint', 'app.pqmp_product_formulation', 'app.pqmp_storage_condition', 'app.sadr_known_allergy', 'app.sadr_list_of_drug');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->County = ClassRegistry::init('County');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->County);

		parent::tearDown();
	}

}
