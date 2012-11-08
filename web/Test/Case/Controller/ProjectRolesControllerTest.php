<?php
App::uses('ProjectRolesController', 'Controller');

/**
 * TestProjectRolesController *
 */
class TestProjectRolesController extends ProjectRolesController {
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
 * ProjectRolesController Test Case
 *
 */
class ProjectRolesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.project_role', 'app.project', 'app.article', 'app.document_line', 'app.quote', 'app.user', 'app.group', 'app.address', 'app.client', 'app.bank_detail', 'app.supplier', 'app.email', 'app.client_referent', 'app.telephone', 'app.supplier_referent', 'app.business_line', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjectRoles = new TestProjectRolesController();
		$this->ProjectRoles->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectRoles);

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
