<?php
App::uses('PqmpStorageConditionsController', 'Controller');

/**
 * TestPqmpStorageConditionsController *
 */
class TestPqmpStorageConditionsController extends PqmpStorageConditionsController {
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
 * PqmpStorageConditionsController Test Case
 *
 */
class PqmpStorageConditionsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.pqmp_storage_condition', 'app.pqmp', 'app.user', 'app.group', 'app.sadr', 'app.attachment', 'app.sadr_known_allergy', 'app.sadr_list_of_drug', 'app.pqmp_complaint', 'app.pqmp_product_formulation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PqmpStorageConditions = new TestPqmpStorageConditionsController();
		$this->PqmpStorageConditions->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PqmpStorageConditions);

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
