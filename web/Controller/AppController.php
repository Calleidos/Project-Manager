<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	protected function unbindModel ($thisModel, $otherModel, $associationType) {
			$this->$thisModel->unbindModel(
				array(
					$associationType => array($otherModel))
				);
	}
	protected function unbindAllModels ($model) {
		$associations=array('hasOne', 'hasMany', 'belongsTo', 'hasAndBelongsToMany');
		foreach ($associations as $association)
			if ($this->$model->$association<>null)
				foreach ($this->$model->$association as $relation=>$data)
					$this->unbindModel($model, $relation, $association);	
	}
	
	public function checkProjectQuoteStatus($project_id){
		$this->loadModel("Project");
		$this->loadModel("Article");
		$quotes=$this->Project->Quote->find('all', array('conditions'=>array("project_id"=>$project_id, 'deleted' => false)));
		$articles=$this->Project->Article->find('all', array('conditions'=>array("project_id"=>$project_id, 'Article.status'=>true)));
		$preventivato=array();
		$confermato=array();
		foreach ($articles as $article) {
			$articolo=1;
			$preventivato[$article['Article']['id']]=false;
			$confermato[$article['Article']['id']]=false;
			foreach ($quotes as $quote) {
				foreach ($quote['DocumentLine'] as $dl)
					if ($dl['article_id']==$article['Article']['id']) {
						$preventivato[$article['Article']['id']]=true;
						$articolo=3;
						if ($quote['Quote']['confirmed']) {
							$confermato[$article['Article']['id']]=true;
							$articolo=4;
						}
					}
			}
			$data=array("Article" => array('id' => $article['Article']['id'], 'quote_status' => $articolo));
			$this->Article->save($data);
		}
		$status=1;//non preventivato
		$k=1;
		if (empty($confermato))
			$confermato=array(false);
		if (empty($preventivato))
			$preventivato=array(false);
		foreach ($confermato as $conf) {
			pr("CONF=".$conf);
			pr("K=".$k);
			$k=$k&&$conf;
			pr("K&&CONF=".$k);
		}
		if ($k) {
			pr("k is true");
			$status=4; //progetto completamente approvato
		} else {
			$k=1;
			foreach ($preventivato as $pr) {
				$k=$k&&$pr;	
			}
			if ($k) {
				$status=3; //progetto completamente preventivato ma non approvato
			} else {
				$k=0;
				foreach ($preventivato as $pr) {
					$k=$k||$pr;	
				}
				if ($k) {
					$status=2; //progetto parzialmente preventivato
				}
			}
		}
		
		$data=array('Project' => array('id' => $project_id, 'quote_status' => $status));
		$this->Project->save($data);
		pr($data);
//		die;
	}
	
}
