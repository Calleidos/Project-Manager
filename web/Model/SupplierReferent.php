<?php
App::uses('AppModel', 'Model');
/**
 * SupplierReferent Model
 *
 * @property Supplier $Supplier
 * @property Address $Address
 * @property Email $Email
 * @property Telephone $Telephone
 */
class SupplierReferent extends AppModel {
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
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
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
			'conditions' => "Email.foreign_model='SupplierReferent'",
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
			'conditions' => "ProjectRole.foreign_model='SupplierReferent'",
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
			'conditions' => "Telephone.foreign_model='SupplierReferent'",
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
