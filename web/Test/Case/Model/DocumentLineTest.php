<?php
App::uses('DocumentLine', 'Model');

/**
 * DocumentLine Test Case
 *
 */
class DocumentLineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.document_line', 'app.article', 'app.project', 'app.project_role', 'app.client_referent', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.supplier', 'app.bank_detail', 'app.supplier_referent', 'app.telephone', 'app.business_line', 'app.business_lines_article', 'app.quote');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DocumentLine = ClassRegistry::init('DocumentLine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DocumentLine);

		parent::tearDown();
	}

}
