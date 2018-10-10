<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 *
 * @method \App\Model\Entity\Player[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'player':
                $this->Auth->allow(['view', 'canView']);
                break;
            case 'admin':
                $this->Auth->allow(['index', 'view', 'canView']);
                break;
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {        
        if ($this->canView($id)) {
            $user = $this->Players->Users->get($id, ['contain' => []]);
            $club = array();
            if($user['player_id'] != NULL){
                $player = $this->Players->get($user['player_id']);
                $this->set('player', $player);
            
                $club = $this->Players->Clubs->get($player['club_id']);  
            }
            $this->set(compact('user','club'));
        } else {
            $this->Flash->error(__('You do not have the rights to see this user.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }
    
     /**
     * View method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|true or false
     */
    public function canView($id = null){     
        $allowed = false;
        $user = $this->Auth->user();
        
        if ($user['role'] === "admin") {
            $allowed = true;
        } else if ($user['role'] === "player") {
            if ($user['id'] == $id) {
                $allowed = true;
            }
        }
        
        return $allowed;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $users = $this->Players->Users->find('list', ['limit' => 200]);
        $clubs = $this->Players->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('player', 'users', 'clubs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $users = $this->Players->Users->find('list', ['limit' => 200]);
        $clubs = $this->Players->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('player', 'users', 'clubs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $player = $this->Players->get($id);
        if ($this->Players->delete($player)) {
            $this->Flash->success(__('The player has been deleted.'));
        } else {
            $this->Flash->error(__('The player could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
