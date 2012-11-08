<?php
App::uses('Article', 'Model');

/**
 * Article Test Case
 *
 */
class ArticleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.article', 'app.project', 'app.project_role', 'app.client_referent', 'app.client', 'app.address', 'app.user', 'app.group', 'app.email', 'app.supplier', 'app.bank_detail', 'app.supplier_referent', 'app.telephone', 'app.document_line', 'app.business_line', 'app.business_lines_article');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Article = ClassRegistry::init('Article');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Article);

		parent::tearDown();
	}

}
