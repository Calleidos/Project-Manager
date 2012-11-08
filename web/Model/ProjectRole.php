<?php
App::uses('AppModel', 'Model');
/**
 * ProjectRole Model
 *
 * @property Project $Project
 * @property ClientReferent $ClientReferent
 * @property SupplierReferent $SupplierReferent
 * @property User $User
 */
class ProjectRole extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'role';

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
		'ClientReferent' => array(
			'className' => 'ClientReferent',
			'foreignKey' => 'foreign_id',
			'conditions' => "ProjectRole.foreign_model='ClientReferent'",
			'fields' => '',
			'order' => ''
		),
		'SupplierReferent' => array(
			'className' => 'SupplierReferent',
			'foreignKey' => 'foreign_id',
			'conditions' => "ProjectRole.foreign_model='SupplierReferent'",
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'foreign_id',
			'conditions' => "ProjectRole.foreign_model='User'",
			'fields' => '',
			'order' => ''
		)
	);
}
