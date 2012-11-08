<?php
App::uses('ProjectRole', 'Model');

/**
 * ProjectRole Test Case
 *
 */
class ProjectRoleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.project_role', 'app.project', 'app.article', 'app.client_referent', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.supplier', 'app.bank_detail', 'app.supplier_referent', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjectRole = ClassRegistry::init('ProjectRole');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectRole);

		parent::tearDown();
	}

}
