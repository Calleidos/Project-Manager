<?php
App::uses('AppModel', 'Model');
/**
 * BankDetail Model
 *
 * @property Client $Client
 * @property Supplier $Supplier
 */
class BankDetail extends AppModel {
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
			'conditions' => "BankDetail.foreign_model='Client'",
			'fields' => '',
			'order' => ''
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'foreign_id',
			'conditions' => "BankDetail.foreign_model='Supplier'",
			'fields' => '',
			'order' => ''
		)
	);
}
