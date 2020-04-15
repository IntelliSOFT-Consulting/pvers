<?php
App::uses('SadrListOfDrugsController', 'Controller');

/**
 * TestSadrListOfDrugsController *
 */
class TestSadrListOfDrugsController extends SadrListOfDrugsController {
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
 * SadrListOfDrugsController Test Case
 *
 */
class SadrListOfDrugsControllerTestCase extends CakeTestCase {
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
		$this->SadrListOfDrugs = new TestSadrListOfDrugsController();
		$this->SadrListOfDrugs->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SadrListOfDrugs);

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
