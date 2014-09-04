<?php

App::uses('AppController', 'Controller');

/**
 * Chats Controller
 *
 * @property Chat $Chat
 * @property PaginatorComponent $Paginator
 */
class ChatsController extends AppController
{

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
    public function index()
    {


        $this->Chat->recursive = 0;
        $this->set('chats', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Chat->exists($id)) {
            throw new NotFoundException(__('Invalid chat'));
        }
        $options = array('conditions' => array('Chat.' . $this->Chat->primaryKey => $id));
        $this->set('chat', $this->Chat->find('first', $options));
    }
    /**
     * watch method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function watch($id = null)
    {
        if (!$this->Chat->exists($id)) {
            throw new NotFoundException(__('Invalid chat'));
        }
        $options = array('conditions' => array('Chat.' . $this->Chat->primaryKey => $id));
        $this->set('chat', $this->Chat->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Chat->create();
            if ($this->Chat->save($this->request->data)) {
                $this->Session->setFlash(__('The chat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chat could not be saved. Please, try again.'));
            }
        }
        $agents = $this->Chat->Agent->find('list');
        $this->set(compact('agents'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Chat->exists($id)) {
            throw new NotFoundException(__('Invalid chat'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chat->save($this->request->data)) {
                $this->Session->setFlash(__('The chat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chat could not be saved. Please, try again.'));
            }
        } else {
            $options             = array('conditions' => array('Chat.' . $this->Chat->primaryKey => $id));
            $this->request->data = $this->Chat->find('first', $options);
        }
        $agents = $this->Chat->Agent->find('list');
        $this->set(compact('agents'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Chat->id = $id;
        if (!$this->Chat->exists()) {
            throw new NotFoundException(__('Invalid chat'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Chat->delete()) {
            $this->Session->setFlash(__('The chat has been deleted.'));
        } else {
            $this->Session->setFlash(__('The chat could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * start method
     *
     * @return void
     */
    public function start()
    {
        if ($this->request->is('post')) {
            $this->Chat->create();

            $apiKey    = '44966052';
            $apiSecret = '5e77f7d37adc91cade6dd1ee3d1016d715c42d18';
            $openTok   = new OpenTok\OpenTok($apiKey, $apiSecret);
            // Create a session that attempts to use peer-to-peer streaming:
            $session   = $openTok->createSession();
            $sessionId = $session->getSessionId();
            $token     = $openTok->generateToken($sessionId);
            $this->request->data['Chat']['sessionid'] = $sessionId;
            $this->request->data['Chat']['token'] = $token;
            //debug($this->request->data);
            
            if ($this->Chat->save($this->request->data)) {
                $this->Session->setFlash(__('The chat has been saved.'), 'success');
                return $this->redirect(array('action' => 'create'));
            } else {
                $this->Session->setFlash(__('The chat could not be saved. Please, try again.'), 'error');
            }
        }
    }
}
