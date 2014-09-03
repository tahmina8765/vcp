<?php
App::uses('AppController', 'Controller');
/**
 * Expertises Controller
 *
 * @property Expertise $Expertise
 * @property PaginatorComponent $Paginator
 */
class ExpertisesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Expertise->recursive = 0;
		$this->set('expertises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Expertise->exists($id)) {
			throw new NotFoundException(__('Invalid expertise'));
		}
		$options = array('conditions' => array('Expertise.' . $this->Expertise->primaryKey => $id));
		$this->set('expertise', $this->Expertise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Expertise->create();
			if ($this->Expertise->save($this->request->data)) {
				$this->Session->setFlash(__('The expertise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expertise could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Expertise->exists($id)) {
			throw new NotFoundException(__('Invalid expertise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Expertise->save($this->request->data)) {
				$this->Session->setFlash(__('The expertise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expertise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Expertise.' . $this->Expertise->primaryKey => $id));
			$this->request->data = $this->Expertise->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Expertise->id = $id;
		if (!$this->Expertise->exists()) {
			throw new NotFoundException(__('Invalid expertise'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Expertise->delete()) {
			$this->Session->setFlash(__('The expertise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The expertise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
