<?php
App::uses('AppModel', 'Model');
/**
 * ClientReferent Model
 *
 * @property Client $Client
 * @property Address $Address
 * @property Email $Email
 * @property Telephone $Telephone
 */
class ClientReferent extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => "",
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
		'Email' => array(
			'className' => 'Email',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "Email.foreign_model='ClientReferent'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProjectRole' => array(
			'className' => 'ProjectRole',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "ProjectRole.foreign_model='ClientReferent'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Telephone' => array(
			'className' => 'Telephone',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "Telephone.foreign_model='ClientReferent'",
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
