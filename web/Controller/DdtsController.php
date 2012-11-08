<?php
App::uses('AppController', 'Controller');
/**
 * Ddts Controller
 *
 * @property Ddt $Ddt
 */
class DdtsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ddt->recursive = 0;
		$this->set('ddts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ddt->id = $id;
		if (!$this->Ddt->exists()) {
			throw new NotFoundException(__('Invalid ddt'));
		}
		$project=$this->Ddt->query("
			SELECT DISTINCT Project.id FROM `ddts`
			LEFT JOIN document_lines dl ON (ddts.id=dl.foreign_id AND dl.foreign_model='Ddt')
			LEFT JOIN articles a ON a.id=dl.article_id
			LEFT JOIN projects as Project ON Project.id=a.project_id
			WHERE ddts.id=$id");
		$this->set("project_id", $project[0]['Project']['id'] );
		$ddt=$this->Ddt->read(null, $id);
		$this->set('ddt', $ddt);
		$articles=array();
		if (!empty($ddt['DocumentLine'])) {
			foreach ($ddt['DocumentLine'] as $dl)
				$articles[]=$dl['article_id'];
		}
		pr($articles);
		$this->loadModel("Article");
		$articles=$this->Article->find("list", array('fields' => array('id', 'description'), 'conditions' => array ('id' => $articles)));
		pr($articles);
		$this->set('articles', $articles);
		pr($ddt);
	}
	
	
/**
 * pdf method
 *
 * @param string $id
 * @return void
 */
	public function pdf($id = null) {
		$this->Ddt->id = $id;
		if (!$this->Ddt->exists()) {
			throw new NotFoundException(__('Invalid ddt'));
		}
		$project=$this->Ddt->query("
			SELECT DISTINCT Project.id FROM `ddts`
			LEFT JOIN document_lines dl ON (ddts.id=dl.foreign_id AND dl.foreign_model='Ddt')
			LEFT JOIN articles a ON a.id=dl.article_id
			LEFT JOIN projects as Project ON Project.id=a.project_id
			WHERE ddts.id=$id");
		$this->set("project_id", $project[0]['Project']['id'] );
		$ddt=$this->Ddt->read(null, $id);
		$this->set('ddt', $ddt);
		$articles=array();
		if (!empty($ddt['DocumentLine'])) {
			foreach ($ddt['DocumentLine'] as $dl)
				$articles[]=$dl['article_id'];
		}
		$this->loadModel("Article");
		$articles=$this->Article->find("list", array('fields' => array('id', 'description'), 'conditions' => array ('id' => $articles)));
		$this->loadModel("Client");
		$client=$this->Client->read(null, $ddt['Project']['client_id']);
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
				if (isset($dl['includi']) && $dl['includi']==1)
					$save=true;
			}
			if (!$save)
				$this->Session->setFlash(__('You must include at least one article'));
			else {
				foreach($this->request->data['DocumentLine'] as $dl) {
					if ($dl['includi']==1 && (( trim($dl['quantita']=="" || $dl['quantita']==0 ) ))) {
						$save=false;
					}
				}
				if (!$save) {
					$this->Session->setFlash(__('Devi indicare una quantita\' per ogni elemento selezionato'));
				} else {
					if (in_array($this->request->data['Ddt']['pagamento'], array("RiBa 30", "RiBa 60", "RiBa 90"))) {
						$project=$this->Ddt->Project->read(null, $this->request->data['Ddt']['project_id']);
						$client=$this->Ddt->Project->Client->read(null, $project['Project']['client_id']);
						if (empty($client['BankDetail'])) {
							$this->Session->setFlash(__('You can\'t create a RiBa payment in you haven\'t inserted bank details for the client'));
							$save=false;
						}
					}
					if ($save) {
						$this->Ddt->create();
						if ($this->Ddt->save($this->request->data)) {
							$ddtId=$this->Ddt->id;
							$totale=0;
							foreach ($this->request->data['DocumentLine'] as $dl) {
								if ($dl['includi']) {
									$dl['foreign_id']=$ddtId;
									$dl['foreign_model']="Ddt";
									$this->Ddt->DocumentLine->create();
									$this->Ddt->DocumentLine->save($dl);
									$totale+=$dl['prezzo'];
								}
							}
							$data['Ddt']['id']=$ddtId;
							$data['Ddt']['totale']=$totale;
							$this->Ddt->save($data);
							$this->checkProjectQuoteStatus($project_id);
							$this->Session->setFlash(__('The ddt has been saved'));
							$this->redirect(array('action' => 'view', $ddtId));
						} else {
							$this->Session->setFlash(__('The ddt could not be saved. Please, try again.'));
						}
					}
				}
			}
		}
		if (isset($project_id)) {
			$confirmedQuotes=$this->Ddt->DocumentLine->Quote->find('all', array('conditions'=>array('Quote.project_id'=>$project_id, 'Quote.confirmed' => 1, 'Quote.deleted'=>0)));
			
			$articleIds=array();
			foreach ($confirmedQuotes as $cf)
				foreach ($cf['DocumentLine'] as $dl) {
					$quoteArticles[$dl['article_id']]+=$dl['quantita'];
					if (!in_array($dl['article_id'], $articleIds))
						$articleIds[]=$dl['article_id'];
				}
			
			if (empty($confirmedQuotes)) {
				$this->Session->setFlash(__('There are no confirmed quotes in this project. DDTs can only be created with a confirmed quote'));
				$this->redirect(array('controller' =>'projects', 'action' => 'view', $project_id));
			}
			$confirmedDdts=$this->Ddt->DocumentLine->Ddt->find('all', array('conditions'=>array('Ddt.project_id'=>$project_id, /*'Ddt.confirmed' => 1,*/ 'Ddt.deleted'=>0)));
			
			foreach ($confirmedDdts as $cf)
				foreach ($cf['DocumentLine'] as $dl) {
					$ddtArticles[$dl['article_id']]+=$dl['quantita'];
					if (!in_array($dl['article_id'], $articleIds))
						$articleIds[]=$dl['article_id'];
				}
			
			pr($articleIds);
			$articles=$this->Ddt->DocumentLine->Article->find('list', array('conditions'=>array('id' => $articleIds), 'fields' => array('id', 'description')));
			pr($articles);
			foreach ($confirmedQuotes as $cf) {
				foreach ($cf['DocumentLine'] as $quote)
				$quote['quoteQuantity']=$quoteArticles[$quote['article_id']];
				$quote['ddtQuantity']=$ddtArticles[$quote['article_id']];
				$quote['description']=$articles[$quote['article_id']];
				$articles[]=$quote;
			}
			pr($articles);
			
			$this->set("project_id", $project_id);
			
		} else {
			$project_id=$this->request->data['Ddt']['project_id'];
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
		
		$creators = $this->Ddt->Creator->find('list');
		$modifiers = $this->Ddt->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ddt->id = $id;
		if (!$this->Ddt->exists()) {
			throw new NotFoundException(__('Invalid ddt'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ddt->save($this->request->data)) {
				$this->checkProjectQuoteStatus($project_id);
				$this->Session->setFlash(__('The ddt has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ddt could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ddt->read(null, $id);
		}
		
		$project_id=$this->request->data['Ddt']['project_id'];
		
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
		
		$creators = $this->Ddt->Creator->find('list');
		$modifiers = $this->Ddt->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
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
		$this->Ddt->id = $id;
		if (!$this->Ddt->exists()) {
			throw new NotFoundException(__('Invalid ddt'));
		}
		$data=$this->Ddt->read(null, $id);
		if (!$data['Ddt']['confirmed']) {
			$data['Ddt']['deleted']=1;
			if ($this->Ddt->save($data)) {
				$this->checkProjectQuoteStatus($project_id);
				$this->Session->setFlash(__('Ddt deleted'));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
			}
			$this->Session->setFlash(__('Ddt was not deleted'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		} else {
			$this->Session->setFlash(__('Ddt was not deleted because it has been confirmed'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		}
	}
	

}




