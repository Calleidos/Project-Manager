<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 */
class ArticlesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($project_id=null) {
		if ($this->request->is('post')) {
			$this->Article->create();
			$this->request->data['Article']['status']=1;
			$this->request->data['Article']['quote_status']=1;
			if ($this->Article->save($this->request->data)) {
				$this->checkProjectQuoteStatus($this->request->data['Article']['project_id']);
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $this->request->data[$this->modelClass]['project_id']));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		}
		if (isset($project_id)) {
			$this->request->data[$this->modelClass]['project_id']=$project_id;
		}
		$businessLines = $this->Article->BusinessLine->find('list');
		$this->set(compact('projects', 'businessLines'));
		$this->render('edit');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->checkProjectQuoteStatus($this->request->data['Article']['project_id']);
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $this->request->data[$this->modelClass]['project_id']));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
		}
		$businessLines = $this->Article->BusinessLine->find('list');
		$this->set(compact('projects', 'businessLines'));
	}

	
/**
 * activates method
 *
 * @param string $id
 * @return void
 */
	public function activate($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$confirmed=$this->Article->query("
			SELECT Quote.id, Quote.name, Quote.data FROM quotes as Quote
			LEFT JOIN document_lines dl ON (dl.foreign_id=Quote.id AND dl.foreign_model='Quote')
			LEFT JOIN articles ON articles.id=dl.article_id
			WHERE articles.id=$id AND Quote.confirmed=1");
		$data=$this->Article->read(null, $id);
		if (empty($confirmed)) {
			$data['Article']['status']=!$data['Article']['status'];
			if ($this->Article->save($data)) {
				$this->checkProjectQuoteStatus($data['Article']['project_id']);
				$this->Session->setFlash(__('The article has been (dis)activated'));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $data[$this->modelClass]['project_id']));
			} else {
				$this->Session->setFlash(__('The article could not be (dis)activated. Please, try again.'));
			}
		} else {
			$this->set('confirmed', $confirmed);
			$this->set('project_id', $data['Article']['project_id']);
		}
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
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'));
			$this->checkProjectQuoteStatus($project_id);
			$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
		}
		$this->Session->setFlash(__('Article was not deleted'));
		$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
	}
}
