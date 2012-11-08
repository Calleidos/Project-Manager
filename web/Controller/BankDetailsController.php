<?php
App::uses('AppController', 'Controller');
/**
 * BankDetails Controller
 *
 * @property BankDetail $BankDetail
 */
class BankDetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BankDetail->recursive = 0;
		$this->set('bankDetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BankDetail->id = $id;
		if (!$this->BankDetail->exists()) {
			throw new NotFoundException(__('Invalid bank detail'));
		}
		$this->set('bankDetail', $this->BankDetail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($foreign_id=null, $foreign_model=null) {
		if ($this->request->is('post')) {
			$this->BankDetail->create();
			if ($this->BankDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The bank detail has been saved'));
				$this->redirect(array('controller'=>strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model'])), 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The bank detail could not be saved. Please, try again.'));
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
		$this->BankDetail->id = $id;
		if (!$this->BankDetail->exists()) {
			throw new NotFoundException(__('Invalid bank detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BankDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The bank detail has been saved'));
				$this->redirect(array('controller'=>strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model'])), 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The bank detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BankDetail->read(null, $id);
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
		$this->BankDetail->id = $id;
		if (!$this->BankDetail->exists()) {
			throw new NotFoundException(__('Invalid bank detail'));
		}
		if ($this->BankDetail->delete()) {
			$this->Session->setFlash(__('Bank detail deleted'));
			$this->redirect(array('controller'=>Inflector::pluralize($foreign_model), 'action' => 'view', $foreign_id));
		}
		$this->Session->setFlash(__('Bank detail was not deleted'));
		$this->redirect(array('controller'=>Inflector::pluralize($foreign_model), 'action' => 'view', $foreign_id));
	}
}
