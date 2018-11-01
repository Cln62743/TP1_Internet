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
class PlayerTournamentParticipationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $user = $this->Auth->user();
        if ($user['role'] === 'player') {
            $this->Auth->allow(['subscribe']);
        }
    }
    
    public function subscribe($id){
        $user = $this->Auth->user();
        
        
        $subcribtion = $this->PlayerTournamentParticipations->newEntity([
            'player_id' => $user['player_id'],
            'tournament_id' => $id
        ]);
        
        if ($this->PlayerTournamentParticipations->save($subcribtion)) {
            $this->Flash->success(__('The player registration has been saved.'));               
        }else{
            $this->Flash->error(__('The player registration could not be saved. Please, try again.'));
        }        
        return $this->redirect(['controller' => 'tournaments', 'action' => 'view', $id]);
    }
}
