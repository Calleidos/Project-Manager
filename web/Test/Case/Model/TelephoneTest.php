<?php
App::uses('Telephone', 'Model');

/**
 * Telephone Test Case
 *
 */
class TelephoneTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.telephone', 'app.client', 'app.address', 'app.client_referent', 'app.email', 'app.user', 'app.group', 'app.supplier', 'app.bank_detail', 'app.supplier_referent');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Telephone = ClassRegistry::init('Telephone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Telephone);

		parent::tearDown();
	}

}
