<?php
App::uses('Sadr', 'Model');

/**
 * Sadr Test Case
 *
 */
class SadrTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sadr', 'app.user', 'app.group', 'app.pqmp', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sadr = ClassRegistry::init('Sadr');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sadr);

		parent::tearDown();
	}

}
