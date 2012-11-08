<?php
/**
 * QuoteFixture
 *
 */
class QuoteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created_by_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified_by_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'data' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'confirmed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'pagamento' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2012-07-06 15:08:38',
			'created_by_id' => 1,
			'modified' => '2012-07-06 15:08:38',
			'modified_by_id' => 1,
			'data' => '2012-07-06 15:08:38',
			'confirmed' => 1,
			'pagamento' => 'Lorem ipsum dolor '
		),
	);
}
