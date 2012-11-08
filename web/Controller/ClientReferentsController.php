<?php
App::uses('AppController', 'Controller');
/**
 * ClientReferents Controller
 *
 * @property ClientReferent $ClientReferent
 */
class ClientReferentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientReferent->recursive = 0;
		$this->set('clientReferents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientReferent->id = $id;
		if (!$this->ClientReferent->exists()) {
			throw new NotFoundException(__('Invalid client referent'));
		}
		$this->set('clientReferent', $this->ClientReferent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($client=null) {
		if ($this->request->is('post')) {
			$this->ClientReferent->create();
			if ($this->ClientReferent->save($this->request->data)) {
				$this->Session->setFlash(__('The client referent has been saved'));
				$this->redirect(array('controller'=>'clients', 'action' => 'view', $this->request->data[$this->modelClass]['client_id']));
			} else {
				$this->Session->setFlash(__('The client referent could not be saved. Please, try again.'));
			}
		}
		if (isset($client))
			$this->request->data[$this->modelClass]['client_id']=$client;
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ClientReferent->id = $id;
		if (!$this->ClientReferent->exists()) {
			throw new NotFoundException(__('Invalid client referent'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientReferent->save($this->request->data)) {
				$this->Session->setFlash(__('The client referent has been saved'));
				$this->redirect(array('controller'=>'clients', 'action' => 'view', $this->request->data[$this->modelClass]['client_id']));
			} else {
				$this->Session->setFlash(__('The client referent could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ClientReferent->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $client=null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ClientReferent->id = $id;
		if (!$this->ClientReferent->exists()) {
			throw new NotFoundException(__('Invalid client referent'));
		}
		if ($this->ClientReferent->delete()) {
			$this->Session->setFlash(__('Client referent deleted'));
			$this->redirect(array('controller'=>'clients', 'action' => 'view', $client));
		}
		$this->Session->setFlash(__('Client referent was not deleted'));
		$this->redirect(array('controller'=>'clients', 'action' => 'view', $client));
	}
}
