<?php
App::uses('AppController', 'Controller');
/**
 * SupplierReferents Controller
 *
 * @property SupplierReferent $SupplierReferent
 */
class SupplierReferentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SupplierReferent->recursive = 0;
		$this->set('supplierReferents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SupplierReferent->id = $id;
		if (!$this->SupplierReferent->exists()) {
			throw new NotFoundException(__('Invalid supplier referent'));
		}
		$this->set('supplierReferent', $this->SupplierReferent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($supplier=null) {
		if ($this->request->is('post')) {
			$this->SupplierReferent->create();
			if ($this->SupplierReferent->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier referent has been saved'));
				$this->redirect(array('controller'=>'suppliers', 'action' => 'view', $this->request->data[$this->modelClass]['supplier_id']));
			} else {
				$this->Session->setFlash(__('The supplier referent could not be saved. Please, try again.'));
			}
		}
		if (isset($supplier))
			$this->request->data[$this->modelClass]['supplier_id']=$supplier;
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SupplierReferent->id = $id;
		if (!$this->SupplierReferent->exists()) {
			throw new NotFoundException(__('Invalid supplier referent'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SupplierReferent->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier referent has been saved'));
				$this->redirect(array('controller'=>'suppliers', 'action' => 'view', $this->request->data[$this->modelClass]['supplier_id']));
			} else {
				$this->Session->setFlash(__('The supplier referent could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SupplierReferent->read(null, $id);
		}
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
		$this->SupplierReferent->id = $id;
		if (!$this->SupplierReferent->exists()) {
			throw new NotFoundException(__('Invalid supplier referent'));
		}
		if ($this->SupplierReferent->delete()) {
			$this->Session->setFlash(__('Supplier referent deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Supplier referent was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
