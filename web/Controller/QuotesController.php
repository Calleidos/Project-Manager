<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 */
class QuotesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$project=$this->Quote->query("
			SELECT DISTINCT Project.id FROM `quotes`
			LEFT JOIN document_lines dl ON (quotes.id=dl.foreign_id AND dl.foreign_model='Quote')
			LEFT JOIN articles a ON a.id=dl.article_id
			LEFT JOIN projects as Project ON Project.id=a.project_id
			WHERE quotes.id=$id");
		$this->set("project_id", $project[0]['Project']['id'] );
		$quote=$this->Quote->read(null, $id);
		$this->set('quote', $quote);
		$articles=array();
		if (!empty($quote['DocumentLine'])) {
			foreach ($quote['DocumentLine'] as $dl)
				$articles[]=$dl['article_id'];
		}
		$this->loadModel("Article");
		$articles=$this->Article->find("list", array('fields' => array('id', 'description'), 'conditions' => array ('id' => $articles)));
		pr($articles);
		$this->set('articles', $articles);
		pr($quote);
	}
	
	
/**
 * pdf method
 *
 * @param string $id
 * @return void
 */
	public function pdf($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$project=$this->Quote->query("
			SELECT DISTINCT Project.id FROM `quotes`
			LEFT JOIN document_lines dl ON (quotes.id=dl.foreign_id AND dl.foreign_model='Quote')
			LEFT JOIN articles a ON a.id=dl.article_id
			LEFT JOIN projects as Project ON Project.id=a.project_id
			WHERE quotes.id=$id");
		$this->set("project_id", $project[0]['Project']['id'] );
		$quote=$this->Quote->read(null, $id);
		$this->set('quote', $quote);
		$articles=array();
		if (!empty($quote['DocumentLine'])) {
			foreach ($quote['DocumentLine'] as $dl)
				$articles[]=$dl['article_id'];
		}
		$this->loadModel("Article");
		$articles=$this->Article->find("list", array('fields' => array('id', 'description'), 'conditions' => array ('id' => $articles)));
		
		$this->loadModel("Client");
		$client=$this->Client->read(null, $quote['Project']['client_id']);
		$this->set("client", $client);
		
		Configure::write('debug', 0);
		
		$this->set('articles', $articles);
		
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
	}

/**
 * add method
 *
 * @return void
 */
	public function add($project_id=null) {
		if ($this->request->is('post')) {
			$save=false;
			foreach($this->request->data['DocumentLine'] as $dl){
				pr($dl);
				if (isset($dl['includi']) && $dl['includi']==1)
					$save=true;
			}
			if (!$save)
				$this->Session->setFlash(__('You must include at least one article'));
			else {
				foreach($this->request->data['DocumentLine'] as $dl) {
					if ($dl['includi']==1 && ( trim($dl['quantita']=="" || $dl['quantita']==0 ) )) {
						$save=false;
					}
				}
				if (!$save) {
					$this->Session->setFlash(__('Devi indicare un prezzo e una quantita\' per ogni elemento selezionato'));
				} else {
					if (in_array($this->request->data['Quote']['pagamento'], array("RiBa 30", "RiBa 60", "RiBa 90"))) {
						$project=$this->Quote->Project->read(null, $this->request->data['Quote']['project_id']);
						$client=$this->Quote->Project->Client->read(null, $project['Project']['client_id']);
						if (empty($client['BankDetail'])) {
							$this->Session->setFlash(__('You can\'t create a RiBa payment in you haven\'t inserted bank details for the client'));
							$save=false;
						}
					}
					if ($save) {
						$this->Quote->create();
						if ($this->Quote->save($this->request->data)) {
							$quoteId=$this->Quote->id;
							$totale=0;
							foreach ($this->request->data['DocumentLine'] as $dl) {
								if ($dl['includi']) {
									$dl['foreign_id']=$quoteId;
									$dl['foreign_model']="Quote";
									$this->Quote->DocumentLine->create();
									$this->Quote->DocumentLine->save($dl);
									$totale+=$dl['prezzo'];
								}
							}
							$data['Quote']['id']=$quoteId;
							$data['Quote']['totale']=$totale;
							$this->Quote->save($data);
							$this->checkProjectQuoteStatus($project_id);
							$this->Session->setFlash(__('The quote has been saved'));
							$this->redirect(array('action' => 'view', $quoteId));
						} else {
							$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
						}
					}
				}
			}
		}
		if (isset($project_id)) {
			$articles=$this->Quote->DocumentLine->Article->find('all', array('conditions'=>array('Article.project_id'=>$project_id)));
			$this->set('articles', $articles);
			$this->set("project_id", $project_id);
		} else {
			$project_id=$this->request->data['Quote']['project_id'];
		}
		
		$this->loadModel("Client");
		$this->loadModel("Project");
		$project=$this->Project->read(null, $project_id);
		$client=$this->Client->read(null, $project['Project']['client_id']);
		$email=$client['Email'];
		if (isset($client['ClientReferent']) && !empty($client['ClientReferent'])) {
			foreach ($client['ClientReferent'] as $cr)
				$ids[]=$cr['id'];
		}
		$clientReferents=$this->Project->Client->ClientReferent->find("all", array('conditions'=>array('ClientReferent.id'=>$ids)));
		foreach ($clientReferents as $cf) {
			if(isset($cf['Email']) && !empty($cf['Email']))
				foreach ($cf['Email'] as $em)
				$email[]=$em;
		}
		pr($email);
		$cr=array();
		foreach ($client['ClientReferent'] as $clientRef)
			$cr[$clientRef['id']]=$clientRef['nome']." - ".$clientRef['ruolo'];
		$emails=array();
		foreach ($email as $e) {
			if ($e['foreign_model']=='Client')
				$index="Mail Aziendale";
			else
				$index=$cr[$e['foreign_id']];
			$emails[$e['email_address']]=$index." - ".$e['email_address'];
		}
		
		$this->set("email", $emails);
		
		$this->set("client", $client);
		
		$this->loadModel("ClientReferent");
		
		$indirizzo=array();
		foreach ($client['Address'] as $addresses)
			$indirizzo[$addresses['address']."\n".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation']]=$addresses['type']." - ".$addresses['address']." ".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation'];
		
		$this->set("addresses", $indirizzo);
		
		$referenti=array();
		foreach ($client['ClientReferent'] as $clientReferent)
			$referenti[$clientReferent['id']]=$clientReferent['ruolo']." - ".$clientReferent['nome'];
		
		$this->set("referenti", $referenti);
		//die;
		
		$creators = $this->Quote->Creator->find('list');
		$modifiers = $this->Quote->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
		$paymentType=$this->Quote->Project->Client->PaymentType->find('list', array('fields' => array('id', 'type')));
		array_unshift($paymentType, "");
		
		$this->set("paymenttype", $paymentType);
		$this->set("paymentDefault", $client['Client']['paymenttype_id']);
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Quote->save($this->request->data)) {
				$this->checkProjectQuoteStatus($project_id);
				$this->Session->setFlash(__('The quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Quote->read(null, $id);
		}
		
		$project_id=$this->request->data['Quote']['project_id'];
		
		$this->loadModel("Client");
		$this->loadModel("Project");
		$project=$this->Project->read(null, $project_id);
		$client=$this->Client->read(null, $project['Project']['client_id']);
		
		$email=$client['Email'];
		if (isset($client['ClientReferent']) && !empty($client['ClientReferent'])) {
			foreach ($client['ClientReferent'] as $cr)
				$ids[]=$cr['id'];
		}
		$clientReferents=$this->Project->Client->ClientReferent->find("all", array('conditions'=>array('ClientReferent.id'=>$ids)));
		foreach ($clientReferents as $cf) {
			if(isset($cf['Email']) && !empty($cf['Email']))
				foreach ($cf['Email'] as $em)
				$email[]=$em;
		}
		pr($email);
		$cr=array();
		foreach ($client['ClientReferent'] as $clientRef)
			$cr[$clientRef['id']]=$clientRef['nome']." - ".$clientRef['ruolo'];
		$emails=array();
		foreach ($email as $e) {
			if ($e['foreign_model']=='Client')
				$index="Mail Aziendale";
			else
				$index=$cr[$e['foreign_id']];
			$emails[$e['email_address']]=$index." - ".$e['email_address'];
		}
		
		$this->set("email", $emails);
		
		$this->set("client", $client);
		
		$this->loadModel("ClientReferent");
		
		$indirizzo=array();
		foreach ($client['Address'] as $addresses)
			$indirizzo[$addresses['address']."\n".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation']]=$addresses['type']." - ".$addresses['address']." ".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation'];
		
		$this->set("addresses", $indirizzo);
		
		$referenti=array();
		foreach ($client['ClientReferent'] as $clientReferent)
			$referenti[$clientReferent['id']]=$clientReferent['ruolo']." - ".$clientReferent['nome'];
		
		$this->set("referenti", $referenti);
		
		$creators = $this->Quote->Creator->find('list');
		$modifiers = $this->Quote->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
		$paymentType=$this->Quote->Project->Client->PaymentType->find('list', array('fields' => array('id', 'type')));
		array_unshift($paymentType, "");
		
		$this->set("paymenttype", $paymentType);
		$this->set("paymentDefault", $client['Client']['paymenttype_id']);
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function copyEdit($id = null) {
		if ($this->request->is('post')) {
			$save=false;
			foreach($this->request->data['DocumentLine'] as $dl){
				pr($dl);
				if (isset($dl['includi']) && $dl['includi']==1)
					$save=true;
			}
			if (!$save)
				$this->Session->setFlash(__('You must include at least one article'));
			else {
				foreach($this->request->data['DocumentLine'] as $dl) {
					if ($dl['includi']==1 && ( trim($dl['quantita']=="" || $dl['quantita']==0 ) )) {
						$save=false;
					}
				}
				if (!$save) {
					$this->Session->setFlash(__('Devi indicare un prezzo e una quantita\' per ogni elemento selezionato'));
				} else {
					if (in_array($this->request->data['Quote']['pagamento'], array("RiBa 30", "RiBa 60", "RiBa 90"))) {
						$project=$this->Quote->Project->read(null, $this->request->data['Quote']['project_id']);
						$client=$this->Quote->Project->Client->read(null, $project['Project']['client_id']);
						if (empty($client['BankDetail'])) {
							$this->Session->setFlash(__('You can\'t create a RiBa payment in you haven\'t inserted bank details for the client'));
							$save=false;
						}
					}
					if ($save) {
						$this->Quote->create();
						if ($this->Quote->save($this->request->data)) {
							$quoteId=$this->Quote->id;
							$totale=0;
							foreach ($this->request->data['DocumentLine'] as $dl) {
								if ($dl['includi']) {
									$dl['foreign_id']=$quoteId;
									$dl['foreign_model']="Quote";
									$this->Quote->DocumentLine->create();
									$this->Quote->DocumentLine->save($dl);
									$totale+=$dl['prezzo'];
								}
							}
							$data['Quote']['id']=$quoteId;
							$data['Quote']['totale']=$totale;
							$this->Quote->save($data);
							$this->checkProjectQuoteStatus($project_id);
							$this->Session->setFlash(__('The quote has been saved'));
							$this->redirect(array('action' => 'view', $quoteId));
						} else {
							$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
						}
					}
				}
			}
		} else {
			$this->request->data=$this->Quote->read(null, $id);
			$project_id=$this->request->data['Quote']['project_id'];
		}
		if (isset($project_id)) {
			$articles=$this->Quote->DocumentLine->Article->find('all', array('conditions'=>array('Article.project_id'=>$project_id)));
			$this->set('articles', $articles);
			$this->set("project_id", $project_id);
		} else {
			$project_id=$this->request->data['Quote']['project_id'];
		}
		
		$this->loadModel("Client");
		$this->loadModel("Project");
		$project=$this->Project->read(null, $project_id);
		$client=$this->Client->read(null, $project['Project']['client_id']);
		$email=$client['Email'];
		if (isset($client['ClientReferent']) && !empty($client['ClientReferent'])) {
			foreach ($client['ClientReferent'] as $cr)
				$ids[]=$cr['id'];
		}
		$clientReferents=$this->Project->Client->ClientReferent->find("all", array('conditions'=>array('ClientReferent.id'=>$ids)));
		foreach ($clientReferents as $cf) {
			if(isset($cf['Email']) && !empty($cf['Email']))
				foreach ($cf['Email'] as $em)
				$email[]=$em;
		}
		pr($email);
		$cr=array();
		foreach ($client['ClientReferent'] as $clientRef)
			$cr[$clientRef['id']]=$clientRef['nome']." - ".$clientRef['ruolo'];
		$emails=array();
		foreach ($email as $e) {
			if ($e['foreign_model']=='Client')
				$index="Mail Aziendale";
			else
				$index=$cr[$e['foreign_id']];
			$emails[$e['email_address']]=$index." - ".$e['email_address'];
		}
		
		$this->set("email", $emails);
		
		$this->set("client", $client);
		
		$this->loadModel("ClientReferent");
		
		$indirizzo=array();
		foreach ($client['Address'] as $addresses)
			$indirizzo[$addresses['address']."\n".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation']]=$addresses['type']." - ".$addresses['address']." ".$addresses['zipcode']." ".$addresses['city']." (".$addresses['province'].") - ".$addresses['nation'];
		
		$this->set("addresses", $indirizzo);
		
		$referenti=array();
		foreach ($client['ClientReferent'] as $clientReferent)
			$referenti[$clientReferent['id']]=$clientReferent['ruolo']." - ".$clientReferent['nome'];
		
		$this->set("referenti", $referenti);
		//die;
		
		$creators = $this->Quote->Creator->find('list');
		$modifiers = $this->Quote->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
		$this->render('edit');
	}
	
	public function confirm($id = null, $project_id=null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$articles='';
		$articles=$this->Quote->query("
			SELECT `Article`.`id`, `Article`.`project_id`, `Article`.`description`, `Article`.`businessline_id`, `Article`.`status`
			FROM `calleidos_manager`.`articles` AS `Article` 
			LEFT JOIN document_lines AS DocumentLine ON (DocumentLine.article_id = `Article`.`id`) 
			WHERE `DocumentLine`.`foreign_id` = '$id' AND `DocumentLine`.`foreign_model` = 'Quote' AND Article.status=0");
		$data=$this->Quote->read(null, $id);
		$this->set('project_id', $project_id);
		$this->set('quote_id', $id);
		if ((!$data['Quote']['confirmed'] && empty($articles) ) || $data['Quote']['confirmed'] ) {
			if ($data['Quote']['confirmed'])
				$this->confirmQuote($project_id, $this->Quote->id, $data['Quote']['confirmed']);
			$docs=$this->Quote->Project->Document->find('list', array('conditions'=> array( 'project_id'=>$project_id, 'Document.tipologia' => 'Conferma Preventivo')));
			if (empty($docs))
				$this->render("nodoc");
			else {
				$this->set("documents", $docs);
				$this->render("chooseDoc");
			}
		} else {
			$this->set('articles', $articles);
		}
		
	}
	
	public function confirmQuote($project_id, $quote_id, $confirm=0, $doc=0) {
		$this->Quote->id = $quote_id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$data['Quote']['confirmed']=!$confirm;
		$data['Quote']['document_confirm_id']=$doc;
		if ($this->Quote->save($data)) {
			$this->checkProjectQuoteStatus($project_id);
			$this->Session->setFlash(__('The quote has been (un)confirmed'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		} else {
			$this->Session->setFlash(__('The quote could not be (un)confirmed. Please, try again.'));
		}
		$this->autoRender=false;
	}
	
	public function choose_doc() {
		$this->confirmQuote($this->request->data['Quote']['project_id'], $this->request->data['Quote']['quote_id'], 0, $this->request->data['Quote']['document_id'] );
		$this->autoRender=false;
	}
	
/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $project_id=null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$data=$this->Quote->read(null, $id);
		if (!$data['Quote']['confirmed']) {
			$data['Quote']['deleted']=1;
			if ($this->Quote->save($data)) {
				$this->checkProjectQuoteStatus($project_id);
				$this->Session->setFlash(__('Quote deleted'));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
			}
			$this->Session->setFlash(__('Quote was not deleted'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		} else {
			$this->Session->setFlash(__('Quote was not deleted because it has been confirmed'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		}
	}
	

}




