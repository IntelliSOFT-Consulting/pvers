<?php
App::uses('SadrsFollowup', 'Model');

/**
 * SadrsFollowup Test Case
 *
 */
class SadrsFollowupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sadrs_followup', 'app.user', 'app.group', 'app.designation', 'app.pqmp', 'app.attachment', 'app.sadr', 'app.county', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.pqmp_complaint', 'app.pqmp_product_formulation', 'app.pqmp_storage_condition');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SadrsFollowup = ClassRegistry::init('SadrsFollowup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrsFollowup);

		parent::tearDown();
	}

}
