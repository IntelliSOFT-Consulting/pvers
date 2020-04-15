<?php
App::uses('Aefi', 'Model');

/**
 * Aefi Test Case
 *
 */
class AefiTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.aefi', 'app.user', 'app.group', 'app.designation', 'app.pqmp', 'app.county', 'app.sadr', 'app.sub_county', 'app.attachment', 'app.sadr_followup', 'app.sadr_list_of_drug', 'app.dose', 'app.route', 'app.frequency', 'app.country', 'app.vigiflow');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aefi = ClassRegistry::init('Aefi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aefi);

		parent::tearDown();
	}

}
