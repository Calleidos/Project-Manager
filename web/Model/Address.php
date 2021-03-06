<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property Client $Client
 * @property ClientReferent $ClientReferent
 * @property User $User
 * @property Supplier $Supplier
 * @property SupplierReferent $SupplierReferent
 */
class Address extends AppModel {
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
			'conditions' => "Address.foreign_model='Client'",
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'foreign_id',
			'conditions' => "Address.foreign_model='User'",
			'fields' => '',
			'order' => ''
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'foreign_id',
			'conditions' => "Address.foreign_model='Supplier'",
			'fields' => '',
			'order' => ''
		),
	);
}
