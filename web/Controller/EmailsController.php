<?php
App::uses('AppController', 'Controller');
/**
 * Emails Controller
 *
 * @property Email $Email
 */
class EmailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Email->recursive = 0;
		$this->set('emails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		$this->set('email', $this->Email->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($foreign_id=null, $foreign_model=null) {
		if ($this->request->is('post')) {
			$this->Email->create();
			if ($this->Email->save($this->request->data)) {
				$this->Session->setFlash(__('The email has been saved'));
				$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
				if ($controller=="clientreferents")
					$controller="client_referents";
				$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.'));
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
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Email->save($this->request->data)) {
				$this->Session->setFlash(__('The email has been saved'));
				$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
				if ($controller=="clientreferents")
					$controller="client_referents";
				$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Email->read(null, $id);
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
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		if ($this->Email->delete()) {
			$this->Session->setFlash(__('Email deleted'));
			$controller=strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model']));
			if ($controller=="clientreferents")
				$controller="client_referents";
			$this->redirect(array('controller'=> $controller, 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
		}
		$this->Session->setFlash(__('Email was not deleted'));
		$this->redirect(array('controller'=>Inflector::pluralize($foreign_model), 'action' => 'view', $foreign_id));
	}
}
