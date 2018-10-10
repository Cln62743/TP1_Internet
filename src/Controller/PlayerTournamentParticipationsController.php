<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PlayerTournamentParticipations Controller
 *
 * @property \App\Model\Table\PlayerTournamentParticipationsTable $PlayerTournamentParticipations
 *
 * @method \App\Model\Entity\PlayerTournamentParticipation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
        if ($user) {
            if($user['role'] === 'player') {
                $this->Auth->allow(['subscribe']);
            }
        }
    }    
    
    public function subscribe($id = null){
        
        $user = $this->Auth->user();
        $subcribtion = $this->PlayerTournamentParticipations->newEntity();
            
        $subcribtion->player_id = $user['player_id'];
        $subcribtion->tournament_id = $id;
            
        if ($this->PlayerTournamentParticipations->save($subcribtion)) {
            $this->Flash->success(__('The player registration has been saved.'));               
        }else{
            $this->Flash->error(__('The player registration could not be saved. Please, try again.'));
        }        
        return $this->redirect(['controller' => 'tournaments','action' => 'view', $id]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Tournaments']
        ];
        $playerTournamentParticipations = $this->paginate($this->PlayerTournamentParticipations);

        $this->set(compact('playerTournamentParticipations'));
    }

    /**
     * View method
     *
     * @param string|null $id Player Tournament Participation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playerTournamentParticipation = $this->PlayerTournamentParticipations->get($id, [
            'contain' => ['Users', 'Tournaments']
        ]);

        $this->set('playerTournamentParticipation', $playerTournamentParticipation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playerTournamentParticipation = $this->PlayerTournamentParticipations->newEntity();
        if ($this->request->is('post')) {
            $playerTournamentParticipation = $this->PlayerTournamentParticipations->patchEntity($playerTournamentParticipation, $this->request->getData());
            if ($this->PlayerTournamentParticipations->save($playerTournamentParticipation)) {
                $this->Flash->success(__('The player registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player registration could not be saved. Please, try again.'));
        }
        $users = $this->PlayerTournamentParticipations->Users->find('list', ['limit' => 200]);
        $tournaments = $this->PlayerTournamentParticipations->Tournaments->find('list', ['limit' => 200]);
        $this->set(compact('playerTournamentParticipation', 'users', 'tournaments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Player Tournament Participation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playerTournamentParticipation = $this->PlayerTournamentParticipations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playerTournamentParticipation = $this->PlayerTournamentParticipations->patchEntity($playerTournamentParticipation, $this->request->getData());
            if ($this->PlayerTournamentParticipations->save($playerTournamentParticipation)) {
                $this->Flash->success(__('The player registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player registration could not be saved. Please, try again.'));
        }
        $users = $this->PlayerTournamentParticipations->Users->find('list', ['limit' => 200]);
        $tournaments = $this->PlayerTournamentParticipations->Tournaments->find('list', ['limit' => 200]);
        $this->set(compact('playerTournamentParticipation', 'users', 'tournaments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Player Tournament Participation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playerTournamentParticipation = $this->PlayerTournamentParticipations->get($id);
        if ($this->PlayerTournamentParticipations->delete($playerTournamentParticipation)) {
            $this->Flash->success(__('The player registration has been deleted.'));
        } else {
            $this->Flash->error(__('The player registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
