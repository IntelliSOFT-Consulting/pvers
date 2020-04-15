<?php
App::uses('FacilityCode', 'Model');

/**
 * FacilityCode Test Case
 *
 */
class FacilityCodeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.facility_code');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacilityCode = ClassRegistry::init('FacilityCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacilityCode);

		parent::tearDown();
	}

}
