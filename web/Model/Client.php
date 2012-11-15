<?php
App::uses('AppModel', 'Model');
/**
 * Client Model
 *
 * @property Address $Address
 * @property BankDetail $BankDetail
 * @property ClientReferent $ClientReferent
 * @property Email $Email
 * @property Telephone $Telephone
 */
class Client extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ragione_sociale';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ragione_sociale' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'codice_fiscale' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'partita_iva' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'paymenttype_id' => array(
				'rule' => array('notZero'),
				'message' => 'Devi scegliere la forma di pagamento'
		),
	);

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
			'conditions' => "Address.foreign_model='Client'",
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
			'conditions' => "BankDetail.foreign_model='Client'",
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ClientReferent' => array(
			'className' => 'ClientReferent',
			'foreignKey' => 'client_id',
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
		'Email' => array(
			'className' => 'Email',
			'foreignKey' => 'foreign_id',
			'dependent' => true,
			'conditions' => "Email.foreign_model='Client'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'client_id',
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
			'conditions' => "Telephone.foreign_model='Client'",
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
		var $belongsTo = array(
			'PaymentType' => array(
				'className'    => 'PaymentType',
				'foreignKey'    => 'paymenttype_id'
			)
		);


}
