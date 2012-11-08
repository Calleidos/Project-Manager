<?php
App::uses('AppController', 'Controller');
/**
 * Telephones Controller
 *
 * @property Telephone $Telephone
 */
class TelephonesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Telephone->recursive = 0;
		$this->set('telephones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Telephone->id = $id;
		if (!$this->Telephone->exists()) {
			throw new NotFoundException(__('Invalid telephone'));
		}
		$this->set('telephone', $this->Telephone->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($foreign_id=null, $foreign_model=null) {
		if ($this->request->is('post')) {
			$this->Telephone->create();
			if ($this->Telephone->save($this->request->data)) {
				$this->Session->setFlash(__('The telephone has been saved'));
				$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
				if ($controller=="clientreferents")
					$controller="client_referents";
				$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The telephone could not be saved. Please, try again.'));
			}
		}
		if (isset($foreign_id) && isset($foreign_model)) {
			$this->request->data[$this->modelClass]['foreign_id']=$foreign_id;
			$this->request->data[$this->modelClass]['foreign_model']=$foreign_model;
		}
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Telephone->id = $id;
		if (!$this->Telephone->exists()) {
			throw new NotFoundException(__('Invalid telephone'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Telephone->save($this->request->data)) {
				$this->redirect(array('controller'=>strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model'])), 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
				$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
				if ($controller=="clientreferents")
					$controller="client_referents";
				$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The telephone could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Telephone->read(null, $id);
		}
		
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $foreign_id=null, $foreign_model=null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Telephone->id = $id;
		if (!$this->Telephone->exists()) {
			throw new NotFoundException(__('Invalid telephone'));
		}
		if ($this->Telephone->delete()) {
			$this->Session->setFlash(__('Telephone deleted'));
			$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
				if ($controller=="clientreferents")
					$controller="client_referents";
				$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
		}
		$this->Session->setFlash(__('Telephone was not deleted'));
		$this->redirect(array('controller'=>Inflector::pluralize($foreign_model), 'action' => 'view', $foreign_id));
	}
}
