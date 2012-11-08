<?php
App::uses('AppController', 'Controller');
/**
 * DocumentLines Controller
 *
 * @property DocumentLine $DocumentLine
 */
class DocumentLinesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DocumentLine->recursive = 0;
		$this->set('documentLines', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DocumentLine->id = $id;
		if (!$this->DocumentLine->exists()) {
			throw new NotFoundException(__('Invalid document line'));
		}
		$this->set('documentLine', $this->DocumentLine->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($foreign_id=null, $foreign_model=null, $article_id=null) {
		if ($this->request->is('post')) {
			$this->DocumentLine->create();
			if ($this->DocumentLine->save($this->request->data)) {
				$this->Session->setFlash(__('The document line has been saved'));
				$this->redirect(array('controller'=>strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model'])), 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The document line could not be saved. Please, try again.'));
			}
		}
		if (isset($foreign_id) && isset($foreign_model) && isset($article_id)) {
			$this->request->data[$this->modelClass]['foreign_id']=$foreign_id;
			$this->request->data[$this->modelClass]['foreign_model']=$foreign_model;
			$this->request->data[$this->modelClass]['article_id']=$article_id;
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
		$this->DocumentLine->id = $id;
		if (!$this->DocumentLine->exists()) {
			throw new NotFoundException(__('Invalid document line'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DocumentLine->save($this->request->data)) {
				$this->redirect(array('controller'=>strtolower(Inflector::pluralize($this->request->data[$this->modelClass]['foreign_model'])), 'action' => 'view', $this->request->data[$this->modelClass]['foreign_id']));
			} else {
				$this->Session->setFlash(__('The document line could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DocumentLine->read(null, $id);
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
		$this->DocumentLine->id = $id;
		if (!$this->DocumentLine->exists()) {
			throw new NotFoundException(__('Invalid document line'));
		}
		if ($this->DocumentLine->delete()) {
			$this->Session->setFlash(__('Document line deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Document line was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
