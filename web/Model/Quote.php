<?php
App::uses('AppModel', 'Model');
/**
 * Quote Model
 *
 * @property DocumentLine $DocumentLine
 */
class Quote extends AppModel {

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
			'conditions' => "DocumentLine.foreign_model='Quote'",
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
	
	var $validate = array(
		'pagamento' => array(
			'rule' => array("notZero"),
			'message' => 'Devi scegliere la forma di pagamento'
		),
	);
	
}
