<?php
App::uses('DrugDictionary', 'Model');

/**
 * DrugDictionary Test Case
 *
 */
class DrugDictionaryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.drug_dictionary');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DrugDictionary = ClassRegistry::init('DrugDictionary');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DrugDictionary);

		parent::tearDown();
	}

}
