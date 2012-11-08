<?php
App::uses('AppModel', 'Model');
/**
 * Quote Model
 *
 * @property DocumentLine $DocumentLine
 */
class Ddt extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'DocumentLine' => array(
			'className' => 'DocumentLine',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "DocumentLine.foreign_model='Ddt'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $belongsTo = array(
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'created_by_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifier' => array(
			'className' => 'User',
			'foreignKey' => 'modified_by_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ClientReferent' => array(
			'className' => 'ClientReferent',
			'foreignKey' => 'client_referent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $validate = array(
		'numero_colli' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Numero colli non può essere vuoto',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	

}
