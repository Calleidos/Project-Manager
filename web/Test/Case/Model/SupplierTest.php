<?php
App::uses('Supplier', 'Model');

/**
 * Supplier Test Case
 *
 */
class SupplierTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.supplier', 'app.address', 'app.bank_detail', 'app.email', 'app.supplier_referent', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Supplier = ClassRegistry::init('Supplier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Supplier);

		parent::tearDown();
	}

}
