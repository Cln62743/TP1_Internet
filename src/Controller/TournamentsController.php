<?php
// src/Controller/TournamentsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Tournaments Controller
 *
 * @property \App\Model\Table\TournamentsTable $Tournaments
 *
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TournamentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'player':
                $this->Auth->allow(['index', 'view']);
                break;
            case 'admin':
                $this->Auth->allow(['index', 'view', 'add', 'delete']);
                break;
            }
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Users']
        ];*/
        $tournaments = $this->paginate($this->Tournaments);
        $this->set(compact('tournaments'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => [
                'Players' => ['Users']
                ]
        ]);
        
        $usersTable = TableRegistry::get('Users');
//        $players_id = AppController::array_on_key($tournament['player_tournament_participations'], 'player_id');
        
//        $players = array();
//        if($players_id){
//            $players = $usersTable
//                ->find()
//                ->where(['player_id IN' => $players_id])
//                ->toList();
//        }
        
        $user = $this->Auth->user();
        $this->set(compact('tournament', 'players', 'user'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tournament = $this->Tournaments->newEntity();
        
        if ($this->request->is('post')) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());

            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('the tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournament = $this->Tournaments->get($id, ['contain' => []]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament as been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament', 'user', 'clubs'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tournament = $this->Tournaments->get($id);
        if ($this->Tournaments->delete($tournament)) {
            $this->Flash->success(__('The tournament as been successfuly deleted.'));   
        }else{
            $this->Flash->error(__('The tournament could not be deleted. Please, try again.'));   
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function subscribe($id){
        $user = $this->Auth->user();
        
        $subcribtion = $this->PlayerTournamentParticipations->newEntity();            
        $subcribtion->player_id = $user['player_id'];
        $subcribtion->tournament_id = $id;

        if ($this->PlayerTournamentParticipations->save($subcribtion)) {
            $this->Flash->success(__('The player registration has been saved.'));               
        }else{
            $this->Flash->error(__('The player registration could not be saved. Please, try again.'));
        }        
        return $this->redirect(['controller' => 'tournaments', 'action' => 'view', $id]);
    }
}
