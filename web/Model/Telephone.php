<?php
App::uses('AppModel', 'Model');
/**
 * Telephone Model
 *
 * @property Client $Client
 * @property ClientReferent $ClientReferent
 * @property User $User
 * @property Supplier $Supplier
 * @property SupplierReferent $SupplierReferent
 */
class Telephone extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'type';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'foreign_id',
			'conditions' => "Telephone.foreign_id='Client'",
			'fields' => '',
			'order' => ''
		),
		'ClientReferent' => array(
			'className' => 'ClientReferent',
			'foreignKey' => 'foreign_id',
			'conditions' => "Telephone.foreign_id='ClientReferent'",
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'foreign_id',
			'conditions' => "Telephone.foreign_id='User'",
			'fields' => '',
			'order' => ''
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'foreign_id',
			'conditions' => "Telephone.foreign_id='Supplier'",
			'fields' => '',
			'order' => ''
		),
		'SupplierReferent' => array(
			'className' => 'SupplierReferent',
			'foreignKey' => 'foreign_id',
			'conditions' => "Telephone.foreign_id='SupplierReferent'",
			'fields' => '',
			'order' => ''
		)
	);
}
