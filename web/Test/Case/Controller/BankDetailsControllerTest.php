<?php
App::uses('BankDetailsController', 'Controller');

/**
 * TestBankDetailsController *
 */
class TestBankDetailsController extends BankDetailsController {
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
 * BankDetailsController Test Case
 *
 */
class BankDetailsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.bank_detail', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.client_referent', 'app.project_role', 'app.project', 'app.article', 'app.document_line', 'app.quote', 'app.business_line', 'app.business_lines_article', 'app.supplier_referent', 'app.supplier', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BankDetails = new TestBankDetailsController();
		$this->BankDetails->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BankDetails);

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
