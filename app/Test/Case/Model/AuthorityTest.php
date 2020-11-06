<?php
App::uses('Authority', 'Model');

/**
 * Authority Test Case
 */
class AuthorityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.authority'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Authority = ClassRegistry::init('Authority');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Authority);

		parent::tearDown();
	}

}
