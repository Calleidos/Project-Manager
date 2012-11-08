<?php
App::uses('ClientReferent', 'Model');

/**
 * ClientReferent Test Case
 *
 */
class ClientReferentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.client_referent', 'app.client', 'app.address', 'app.bank_detail', 'app.email', 'app.telephone');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClientReferent = ClassRegistry::init('ClientReferent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClientReferent);

		parent::tearDown();
	}

}
