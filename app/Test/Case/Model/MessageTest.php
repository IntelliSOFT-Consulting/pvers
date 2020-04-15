<?php
App::uses('Message', 'Model');

/**
 * Message Test Case
 *
 */
class MessageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.message', 'app.sadr', 'app.user', 'app.group', 'app.designation', 'app.pqmp', 'app.county', 'app.country', 'app.attachment', 'app.sadr_followup', 'app.sadr_list_of_drug', 'app.dose', 'app.route', 'app.frequency');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Message = ClassRegistry::init('Message');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Message);

		parent::tearDown();
	}

}
