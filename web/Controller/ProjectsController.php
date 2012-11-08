<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$project=$this->Project->read(null, $id);
		
		$this->set('documents',$this->Project->Document->find('list', array('conditions' => array('project_id' => $id) , 'fields' => array('id', 'uploadPath' ))));
		
		$this->set('project', $project);
	}
	
	public function roles($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->loadModel('ProjectRole');
		
		$family=array('UserReferent', 'ClientReferent', 'SupplierReferent');
		foreach ($family as $type) {
			$this->unbindAllModels('ProjectRole');
			$model=$type;
			if ($type=='UserReferent')
				$model='User';
			$this->ProjectRole->bindModel( array( 
				'belongsTo' => array(
					$model => array(
						'className' => $model,
						'foreignKey' => 'foreign_id',
						'conditions' => "foreign_model='$type'" )
				)
			));
			$project['ProjectRole'][$type]=$this->ProjectRole->find('all', array('conditions'=>array('ProjectRole.project_id'=>$id, 'foreign_model' => $type)));
		}
		$this->unbindAllModels('Project');
		$p=$this->Project->read(null, $id);
		$project['Project']=$p['Project'];
		$this->set('project', $project);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$client=$this->Project->Client->read(null, $this->request->data['Project']['client_id']);
			if (!isset($client['Address']) || empty($client['Address'])) {
				$this->Session->setFlash(__('You have not added an address to this client yet. Add an address and then create a project'));
			} else {
				$ids=array();
				if (isset($client['ClientReferent']) && !empty($client['ClientReferent'])) {
					foreach ($client['ClientReferent'] as $cr)
						$ids[]=$cr['id'];
				}
				$clientReferents=$this->Project->Client->ClientReferent->find("all", array('conditions'=>array('ClientReferent.id'=>$ids)));
				$email=$client['Email'];
				$telephones=$client['Telephone'];
				foreach ($clientReferents as $cf) {
					if(isset($cf['Telephone']) && !empty($cf['Telephone']))
						foreach ($cf['Telephone'] as $tel)
						$telephones[]=$tel;
					if(isset($cf['Email']) && !empty($cf['Email']))
						foreach ($cf['Email'] as $em)
						$email[]=$em;
				}
				if (empty($email)) {
					$this->Session->setFlash(__('You have not added an email to this client or to any of its client referents yet. Add an email address and then create a project'));
				} else {
					if (empty($telephones)) {
						$this->Session->setFlash(__('You have not added a telephone number to this client or to any of its client referents yet. Add a telephone number and then create a project'));
					} else {
						$this->Project->create();
						$this->request->data['Project']['quote_status']=1;
						if ($this->Project->save($this->request->data)) {
							$this->Session->setFlash(__('The project has been saved'));
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
						}
					}
				}
				
			}
		}
		$clients=$this->Project->Client->find('list');
		$this->set(compact('clients'));
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'));
				$this->redirect(array('action' => 'view', $this->request->data['Project']['id']));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Project->read(null, $id);
		}
		$clients=$this->Project->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('Project deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
