<?php
App::uses('BankDetail', 'Model');

/**
 * BankDetail Test Case
 *
 */
class BankDetailTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.bank_detail', 'app.client', 'app.address', 'app.client_referent', 'app.email', 'app.telephone', 'app.user', 'app.group', 'app.supplier', 'app.supplier_referent');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BankDetail = ClassRegistry::init('BankDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BankDetail);

		parent::tearDown();
	}

}
