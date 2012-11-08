<?php
App::uses('Address', 'Model');

/**
 * Address Test Case
 *
 */
class AddressTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.address', 'app.client', 'app.bank_detail', 'app.client_referent', 'app.email', 'app.telephone', 'app.user', 'app.group', 'app.supplier', 'app.supplier_referent');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Address = ClassRegistry::init('Address');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Address);

		parent::tearDown();
	}

}
