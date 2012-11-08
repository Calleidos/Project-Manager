<?php
App::uses('SupplierReferent', 'Model');

/**
 * SupplierReferent Test Case
 *
 */
class SupplierReferentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.supplier_referent', 'app.supplier', 'app.address', 'app.bank_detail', 'app.email', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SupplierReferent = ClassRegistry::init('SupplierReferent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SupplierReferent);

		parent::tearDown();
	}

}
