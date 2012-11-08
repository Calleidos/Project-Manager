<?php
App::uses('QuotesController', 'Controller');

/**
 * TestQuotesController *
 */
class TestQuotesController extends QuotesController {
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
 * QuotesController Test Case
 *
 */
class QuotesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.quote', 'app.user', 'app.group', 'app.address', 'app.client', 'app.bank_detail', 'app.supplier', 'app.email', 'app.client_referent', 'app.project_role', 'app.project', 'app.article', 'app.document_line', 'app.business_line', 'app.business_lines_article', 'app.supplier_referent', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quotes = new TestQuotesController();
		$this->Quotes->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quotes);

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
