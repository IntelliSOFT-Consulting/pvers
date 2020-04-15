<?php
App::uses('SadrKnownAllergiesController', 'Controller');

/**
 * TestSadrKnownAllergiesController *
 */
class TestSadrKnownAllergiesController extends SadrKnownAllergiesController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * SadrKnownAllergiesController Test Case
 *
 */
class SadrKnownAllergiesControllerTestCase extends CakeTestCase {
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
		$this->SadrKnownAllergies = new TestSadrKnownAllergiesController();
		$this->SadrKnownAllergies->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrKnownAllergies);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}
/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
}
