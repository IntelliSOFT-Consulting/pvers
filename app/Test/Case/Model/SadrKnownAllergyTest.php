<?php
App::uses('SadrKnownAllergy', 'Model');

/**
 * SadrKnownAllergy Test Case
 *
 */
class SadrKnownAllergyTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sadr_known_allergy', 'app.sadr', 'app.user', 'app.group', 'app.pqmp', 'app.attachment', 'app.sadr_list_of_drug');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SadrKnownAllergy = ClassRegistry::init('SadrKnownAllergy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrKnownAllergy);

		parent::tearDown();
	}

}
