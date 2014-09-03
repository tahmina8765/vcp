<?php
App::uses('AppController', 'Controller');
/**
 * AgentExpertises Controller
 *
 * @property AgentExpertise $AgentExpertise
 * @property PaginatorComponent $Paginator
 */
class AgentExpertisesController extends AppController {

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
		$this->AgentExpertise->recursive = 0;
		$this->set('agentExpertises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AgentExpertise->exists($id)) {
			throw new NotFoundException(__('Invalid agent expertise'));
		}
		$options = array('conditions' => array('AgentExpertise.' . $this->AgentExpertise->primaryKey => $id));
		$this->set('agentExpertise', $this->AgentExpertise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AgentExpertise->create();
			if ($this->AgentExpertise->save($this->request->data)) {
				$this->Session->setFlash(__('The agent expertise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agent expertise could not be saved. Please, try again.'));
			}
		}
		$agents = $this->AgentExpertise->Agent->find('list');
		$expertises = $this->AgentExpertise->Expertise->find('list');
		$this->set(compact('agents', 'expertises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AgentExpertise->exists($id)) {
			throw new NotFoundException(__('Invalid agent expertise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AgentExpertise->save($this->request->data)) {
				$this->Session->setFlash(__('The agent expertise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agent expertise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AgentExpertise.' . $this->AgentExpertise->primaryKey => $id));
			$this->request->data = $this->AgentExpertise->find('first', $options);
		}
		$agents = $this->AgentExpertise->Agent->find('list');
		$expertises = $this->AgentExpertise->Expertise->find('list');
		$this->set(compact('agents', 'expertises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AgentExpertise->id = $id;
		if (!$this->AgentExpertise->exists()) {
			throw new NotFoundException(__('Invalid agent expertise'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AgentExpertise->delete()) {
			$this->Session->setFlash(__('The agent expertise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The agent expertise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
