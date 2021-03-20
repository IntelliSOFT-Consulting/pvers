<?php
App::uses('Meddra', 'Model');

/**
 * Meddra Test Case
 */
class MeddraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meddra'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Meddra = ClassRegistry::init('Meddra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Meddra);

		parent::tearDown();
	}

}
