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
                $this->Auth->allow(['index', 'view', 'findTournament']);
                break;
            case 'admin':
                $this->Auth->allow(['index', 'view', 'add', 'delete', 'findTournament']);
                break;
            }
        }
        $this->Auth->allow(['autocomplete']);
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
    
    public function findTournaments() {
        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Tournaments->find('all', array(
                'conditions' => array('Tournaments.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }
    
    public function autocomplete(){
        
    }
    
    /**
     * View method
     *
     * @param string|null $id Tournament id.
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
        
        // Bâtir la liste des villes  
        $this->loadModel('Cities');
        $cities = $this->Cities->find('list', ['limit' => 200]);
        
        // Extraire le id de la première ville
        $cities = $cities->toArray();
        reset($cities);
        $city_id = key($cities);
        
        $schools = $this->Tournaments->Schools->find('list', [
            'conditions' => ['Schools.city_id' => $city_id],
        ]);
        
        $this->set(compact('tournament', 'cities', 'schools')); 
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Tournament id.
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
     * @param string|null $id Tournament id.
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
    
    /*public function view($id=null)
        {    
            $tournament = $this->Tournaments->get($id, [
                'contain' => [
                    'Players' => ['Users']
                    ]
            ]);

            $user = $this->Auth->user();         
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => 'Essai_' . $id
                ]
            ]);
            return $this->redirect('/tournaments/view/1.pdf');
        }*/
}
