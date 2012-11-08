<?php
/**
 * TelephoneFixture
 *
 */
class TelephoneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'client_referent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'supplier_referent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telephone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'client_id' => 1,
			'client_referent_id' => 1,
			'user_id' => 1,
			'supplier_id' => 1,
			'supplier_referent_id' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'telephone' => 'Lorem ipsum dolor sit amet'
		),
	);
}
