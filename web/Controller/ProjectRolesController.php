<?php
App::uses('AppController', 'Controller');
/**
 * ProjectRoles Controller
 *
 * @property ProjectRole $ProjectRole
 */
class ProjectRolesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProjectRole->recursive = 0;
		$this->set('projectRoles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProjectRole->id = $id;
		if (!$this->ProjectRole->exists()) {
			throw new NotFoundException(__('Invalid project role'));
		}
		$this->set('projectRole', $this->ProjectRole->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($project_id, $foreign_id, $foreign_model) {
		if ($this->request->is('post')) {
			$this->ProjectRole->create();
			if ($this->ProjectRole->save($this->request->data)) {
				$this->Session->setFlash(__('The project role has been saved'));
				$this->redirect(array('controller'=>'projects', 'action' => 'roles', $this->request->data['ProjectRole']['project_id']));
			} else {
				$this->Session->setFlash(__('The project role could not be saved. Please, try again.'));
			}
		}
		if ($foreign_model=='User')
			$foreigns=$this->ProjectRole->$foreign_model->find('list');
		else
			$foreigns=$this->ProjectRole->{$foreign_model."Referent"}->find('list', array('conditions'=>array(strtolower($foreign_model).'_id' => $foreign_id)));
		if (isset($project_id) && isset($foreign_id) && isset($foreign_model)) {
			$this->request->data[$this->modelClass]['project_id']=$project_id;
			$this->request->data[$this->modelClass]['foreign_model']=$foreign_model."Referent";
		}
		$this->set(compact('foreigns'));
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProjectRole->id = $id;
		if (!$this->ProjectRole->exists()) {
			throw new NotFoundException(__('Invalid project role'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjectRole->save($this->request->data)) {
				$this->redirect(array('controller'=>'projects', 'action' => 'roles', $this->request->data['ProjectRole']['project_id']));
			} else {
				$this->Session->setFlash(__('The project role could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProjectRole->read(null, $id);
		}
		$projects = $this->ProjectRole->Project->find('list');
		$clientReferents = $this->ProjectRole->ClientReferent->find('list');
		$supplierReferents = $this->ProjectRole->SupplierReferent->find('list');
		$users = $this->ProjectRole->User->find('list');
		$this->set(compact('projects', 'clientReferents', 'supplierReferents', 'users'));
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
		$this->ProjectRole->id = $id;
		if (!$this->ProjectRole->exists()) {
			throw new NotFoundException(__('Invalid project role'));
		}
		if ($this->ProjectRole->delete()) {
			$this->Session->setFlash(__('Project role deleted'));
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		}
		$this->Session->setFlash(__('Project role was not deleted'));
		$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
	}
}
