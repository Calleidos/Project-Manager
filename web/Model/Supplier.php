<?php
App::uses('AppModel', 'Model');
/**
 * Supplier Model
 *
 * @property Address $Address
 * @property BankDetail $BankDetail
 * @property Email $Email
 * @property SupplierReferent $SupplierReferent
 * @property Telephone $Telephone
 */
class Supplier extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ragione_sociale';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "Address.foreign_model='Supplier'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BankDetail' => array(
			'className' => 'BankDetail',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "BankDetail.foreign_model='Supplier'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Email' => array(
			'className' => 'Email',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "Email.foreign_model='Supplier'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SupplierReferent' => array(
			'className' => 'SupplierReferent',
			'foreignKey' => 'supplier_id',
			'dependent' => true,
			'conditions' => "",
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
			'conditions' => "Telephone.foreign_model='Supplier'",
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
