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

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'view', 'archive');
    }

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
     * archive method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function archive($id = null)
    {
        if (!$this->Chat->exists($id)) {
            throw new NotFoundException(__('Invalid chat'));
        }
        $options   = array('conditions' => array('Chat.' . $this->Chat->primaryKey => $id));
        $chat      = $this->Chat->find('first', $options);
        $sessionId = $chat['Chat']['sessionid'];

        $apiKey    = Configure::read('Opentok.apikey');
        $apiSecret = Configure::read('Opentok.apisecret');
        $openTok   = new OpenTok\OpenTok($apiKey, $apiSecret);
        $archive   = $openTok->startArchive($sessionId, "PHP Archiving Sample App" . $chat['Chat']['name']);
        echo $archive->toJson();
        die();
        $this->autoRender = false;
        $this->response->type('json');
        $return_data      = json_encode($archive);
        $this->response->body($return_data);



//        $archive = $app->opentok->startArchive($sessionId, "PHP Archiving Sample App");
//        $app->response->headers->set('Content-Type', 'application/json');
//        echo $archive->toJson();
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

            $location                                 = Configure::read('Site.ip');
            $apiKey                                   = Configure::read('Opentok.apikey');
            $apiSecret                                = Configure::read('Opentok.apisecret');
            $openTok                                  = new OpenTok\OpenTok($apiKey, $apiSecret);
            // Create a session that attempts to use peer-to-peer streaming:
            $options                                  = array(
                'mediaMode' => 'disabled',
                'location'  => $location
            );
            $session                                  = $openTok->createSession($options);
            $sessionId                                = $session->getSessionId();
            $token                                    = $openTok->generateToken($sessionId);
            $this->request->data['Chat']['sessionid'] = $sessionId;
            $this->request->data['Chat']['token']     = $token;
            //debug($this->request->data);
            if ($this->Chat->save($this->request->data)) {
                $id = $this->Chat->getLastInsertId();
                $this->Session->setFlash(__('The chat has been saved.'), 'success');
                return $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The chat could not be saved. Please, try again.'), 'error');
            }
        }
//        if ($this->request->is('post')) {
//            $this->Chat->create();
//            if ($this->Chat->save($this->request->data)) {
//                $this->Session->setFlash(__('The chat has been saved.'));
//                return $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The chat could not be saved. Please, try again.'));
//            }
//        }
//        $agents = $this->Chat->Agent->find('list');
//        $this->set(compact('agents'));
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

}
