<?php
App::uses('Frequency', 'Model');

/**
 * Frequency Test Case
 *
 */
class FrequencyTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.frequency', 'app.sadr_list_of_drug', 'app.sadr', 'app.user', 'app.group', 'app.designation', 'app.pqmp', 'app.county', 'app.attachment', 'app.sadr_followup');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Frequency = ClassRegistry::init('Frequency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Frequency);

		parent::tearDown();
	}

}
