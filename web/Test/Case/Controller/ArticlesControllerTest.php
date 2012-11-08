<?php
App::uses('ArticlesController', 'Controller');

/**
 * TestArticlesController *
 */
class TestArticlesController extends ArticlesController {
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
 * ArticlesController Test Case
 *
 */
class ArticlesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.article', 'app.project', 'app.project_role', 'app.client_referent', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.supplier', 'app.bank_detail', 'app.supplier_referent', 'app.telephone', 'app.document_line', 'app.quote', 'app.business_line', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Articles = new TestArticlesController();
		$this->Articles->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Articles);

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
