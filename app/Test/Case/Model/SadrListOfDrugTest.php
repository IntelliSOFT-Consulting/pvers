<?php
App::uses('SadrListOfDrug', 'Model');

/**
 * SadrListOfDrug Test Case
 *
 */
class SadrListOfDrugTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sadr_list_of_drug', 'app.sadr', 'app.user', 'app.group', 'app.pqmp', 'app.attachment', 'app.sadr_known_allergy');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SadrListOfDrug = ClassRegistry::init('SadrListOfDrug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrListOfDrug);

		parent::tearDown();
	}

}
