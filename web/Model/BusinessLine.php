<?php
App::uses('AppModel', 'Model');
/**
 * BusinessLine Model
 *
 * @property Article $Article
 */
class BusinessLine extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasMany=array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'dependent' => false,
			'conditions' => "",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
