<?php
App::uses('EmailsController', 'Controller');

/**
 * TestEmailsController *
 */
class TestEmailsController extends EmailsController {
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
 * EmailsController Test Case
 *
 */
class EmailsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.email', 'app.client', 'app.address', 'app.user', 'app.group', 'app.project_role', 'app.project', 'app.article', 'app.document_line', 'app.quote', 'app.business_line', 'app.business_lines_article', 'app.client_referent', 'app.telephone', 'app.supplier', 'app.bank_detail', 'app.supplier_referent');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emails = new TestEmailsController();
		$this->Emails->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emails);

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
