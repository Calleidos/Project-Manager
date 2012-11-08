<?php
App::uses('AppModel', 'Model');
/**
 * DocumentLine Model
 *
 * @property Article $Article
 * @property Quote $Quote
 */
class DocumentLine extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Quote' => array(
			'className' => 'Quote',
			'foreignKey' => 'foreign_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ddt' => array(
			'className' => 'Ddt',
			'foreignKey' => 'foreign_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
