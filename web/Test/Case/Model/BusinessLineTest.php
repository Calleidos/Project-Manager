<?php
App::uses('BusinessLine', 'Model');

/**
 * BusinessLine Test Case
 *
 */
class BusinessLineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.business_line', 'app.article', 'app.project', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.client_referent', 'app.project_role', 'app.supplier_referent', 'app.supplier', 'app.bank_detail', 'app.telephone', 'app.document_line', 'app.quote', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessLine = ClassRegistry::init('BusinessLine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessLine);

		parent::tearDown();
	}

}
