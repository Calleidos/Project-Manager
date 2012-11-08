<?php
App::uses('Quote', 'Model');

/**
 * Quote Test Case
 *
 */
class QuoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.quote', 'app.document_line');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quote = ClassRegistry::init('Quote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quote);

		parent::tearDown();
	}

}
