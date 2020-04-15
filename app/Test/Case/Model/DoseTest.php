<?php
App::uses('Dose', 'Model');

/**
 * Dose Test Case
 *
 */
class DoseTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.dose');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dose = ClassRegistry::init('Dose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dose);

		parent::tearDown();
	}

}
