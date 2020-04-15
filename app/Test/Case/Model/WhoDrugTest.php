<?php
App::uses('WhoDrug', 'Model');

/**
 * WhoDrug Test Case
 *
 */
class WhoDrugTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.who_drug');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WhoDrug = ClassRegistry::init('WhoDrug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WhoDrug);

		parent::tearDown();
	}

}
