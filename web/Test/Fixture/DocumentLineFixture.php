<?php
/**
 * DocumentLineFixture
 *
 */
class DocumentLineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'foreign_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'foreign_model' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'article_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'prezzo' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'quantita' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'consegna' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'consegna_tempo' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'foreign_id' => 1,
			'foreign_model' => 'Lorem ipsum dolor sit a',
			'article_id' => 1,
			'prezzo' => 1,
			'quantita' => 1,
			'consegna' => 1,
			'consegna_tempo' => 'Lorem ipsum dolor sit a'
		),
	);
}
