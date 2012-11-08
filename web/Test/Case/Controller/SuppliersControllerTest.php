<?php
App::uses('SuppliersController', 'Controller');

/**
 * TestSuppliersController *
 */
class TestSuppliersController extends SuppliersController {
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
 * SuppliersController Test Case
 *
 */
class SuppliersControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.supplier', 'app.address', 'app.client', 'app.bank_detail', 'app.client_referent', 'app.email', 'app.user', 'app.group', 'app.project_role', 'app.project', 'app.article', 'app.document_line', 'app.quote', 'app.business_line', 'app.business_lines_article', 'app.supplier_referent', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Suppliers = new TestSuppliersController();
		$this->Suppliers->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Suppliers);

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
