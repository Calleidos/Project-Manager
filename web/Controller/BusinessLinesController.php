<?php
App::uses('AppController', 'Controller');
/**
 * BusinessLines Controller
 *
 * @property BusinessLine $BusinessLine
 */
class BusinessLinesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BusinessLine->recursive = 0;
		$this->set('businessLines', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BusinessLine->id = $id;
		if (!$this->BusinessLine->exists()) {
			throw new NotFoundException(__('Invalid business line'));
		}
		$this->set('businessLine', $this->BusinessLine->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusinessLine->create();
			if ($this->BusinessLine->save($this->request->data)) {
				$this->Session->setFlash(__('The business line has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business line could not be saved. Please, try again.'));
			}
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
		$this->BusinessLine->id = $id;
		if (!$this->BusinessLine->exists()) {
			throw new NotFoundException(__('Invalid business line'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusinessLine->save($this->request->data)) {
				$this->Session->setFlash(__('The business line has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business line could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BusinessLine->read(null, $id);
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
		$this->BusinessLine->id = $id;
		if (!$this->BusinessLine->exists()) {
			throw new NotFoundException(__('Invalid business line'));
		}
		if ($this->BusinessLine->delete()) {
			$this->Session->setFlash(__('Business line deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Business line was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
