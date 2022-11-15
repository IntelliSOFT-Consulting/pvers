<?php
App::uses('AutoDrug', 'Model');

/**
 * AutoDrug Test Case
 */
class AutoDrugTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auto_drug'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AutoDrug = ClassRegistry::init('AutoDrug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AutoDrug);

		parent::tearDown();
	}

}
