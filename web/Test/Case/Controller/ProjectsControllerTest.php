<?php
App::uses('ProjectsController', 'Controller');

/**
 * TestProjectsController *
 */
class TestProjectsController extends ProjectsController {
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
 * ProjectsController Test Case
 *
 */
class ProjectsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.project', 'app.article', 'app.document_line', 'app.quote', 'app.user', 'app.group', 'app.address', 'app.client', 'app.bank_detail', 'app.supplier', 'app.email', 'app.client_referent', 'app.project_role', 'app.supplier_referent', 'app.telephone', 'app.business_line', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Projects = new TestProjectsController();
		$this->Projects->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Projects);

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
