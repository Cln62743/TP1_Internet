<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{    
    public function initialize()
    {
        parent::initialize();
    }
    
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        
        if ($user) {
           switch ($user['role']) {
            case 'player':
                $this->Auth->allow(['logout', 'view', 'redirectAccordingToRole']);
                break;
            case 'admin':
                $this->Auth->allow(['logout', 'view', 'index', 'addPlayer', 'addAdmin', 'redirectAccordingToRole']);
                break;
            }
        } else {
            $this->Auth->allow(['login', 'logout', 'addPlayer']);
        }
    }
    
    // after successful login this method is called
    public function redirectAccordingToRole()
    {
        $user = $this->Auth->user();
        switch ($user['role']) {
            case 'player':
                return $this->redirect(['controller' => 'users', 'action' => 'view', $user['id']]);
            case 'admin':
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users); 
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        
        if($user['role'] === 'player'){
            return $this->redirect(['controller' => 'players', 'action' => 'view', $id]);
        }
        $this->set(compact('user'));
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function logout()
    {
        $this->Flash->success(_('Vous avez été déconnecté.'));
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addPlayer()
    {
        $user = $this->Users->newEntity();        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = 'player';
            
            $playersTable = TableRegistry::get('Players');
            $player = $playersTable->newEntity();
            $player->club_id = $this->request->data['club_id'];
            $playersTable->save($player);
            
            $user->player_id = $player['id'];
                   
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $clubs = $this->Users->Players->Clubs->find('list');
        $this->set(compact('user', 'clubs'));  
    }
    
    public function addAdmin(){
        $user = $this->Users->newEntity();          
        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());       
            $user->role = 'admin';
            $user->player_id = NULL;
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if($user['role'] === 'player'){
                $playersTable = TableRegistry::get('Players');
                $player = $playersTable->get($user['player_id'], [
                    'contain' => []
                ]);
              
                $player->club_id = $this->request->data['club_id'];
                $playersTable->save($player);
            }
                   
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $clubs = $this->Users->Players->Clubs->find('list');
        $this->set(compact('user', 'clubs'));  
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

