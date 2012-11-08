<?php
App::uses('BusinessLinesController', 'Controller');

/**
 * TestBusinessLinesController *
 */
class TestBusinessLinesController extends BusinessLinesController {
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
 * BusinessLinesController Test Case
 *
 */
class BusinessLinesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.business_line', 'app.article', 'app.project', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.client_referent', 'app.project_role', 'app.supplier_referent', 'app.supplier', 'app.bank_detail', 'app.telephone', 'app.document_line', 'app.quote', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessLines = new TestBusinessLinesController();
		$this->BusinessLines->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessLines);

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
