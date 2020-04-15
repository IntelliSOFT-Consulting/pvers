<?php
App::uses('HelpInfo', 'Model');

/**
 * HelpInfo Test Case
 *
 */
class HelpInfoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.help_info');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HelpInfo = ClassRegistry::init('HelpInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HelpInfo);

		parent::tearDown();
	}

}
