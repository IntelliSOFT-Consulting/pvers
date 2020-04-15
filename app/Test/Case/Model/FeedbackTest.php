<?php
App::uses('Feedback', 'Model');

/**
 * Feedback Test Case
 *
 */
class FeedbackTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.feedback', 'app.user', 'app.group', 'app.designation', 'app.pqmp', 'app.county', 'app.sadr', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.sadr_followup', 'app.pqmp_complaint', 'app.pqmp_product_formulation', 'app.pqmp_storage_condition');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Feedback = ClassRegistry::init('Feedback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feedback);

		parent::tearDown();
	}

}
