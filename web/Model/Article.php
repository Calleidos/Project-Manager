<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Project $Project
 * @property DocumentLine $DocumentLine
 * @property BusinessLine $BusinessLine
 */
class Article extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BusinessLine' => array(
			'className' => 'BusinessLine',
			'foreignKey' => 'businessline_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'DocumentLine' => array(
			'className' => 'DocumentLine',
			'foreignKey' => 'article_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
