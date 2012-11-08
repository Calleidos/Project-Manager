<?php
App::uses('Email', 'Model');

/**
 * Email Test Case
 *
 */
class EmailTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.email', 'app.client', 'app.address', 'app.client_referent', 'app.telephone', 'app.user', 'app.group', 'app.supplier', 'app.bank_detail', 'app.supplier_referent');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Email = ClassRegistry::init('Email');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Email);

		parent::tearDown();
	}

}
