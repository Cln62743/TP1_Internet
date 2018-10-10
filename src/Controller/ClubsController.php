<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 *
 * @method \App\Model\Entity\Club[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClubsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {        
        $clubs = $this->paginate($this->Clubs);
        $this->set(compact('clubs'));
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
     * View method
     *
     * @param string|null $id Club id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['files']
        ]); 
        
        
        $usersTable = TableRegistry::get('Users');
        $playersTable = TableRegistry::get('Players');
        
        if($playersTable){
            $playersInClub = $playersTable
                ->find()
                ->where(['club_id IN' => $id])
                ->toList();
        }
        
        $players_id = AppController::array_on_key($playersInClub, 'id');
        $users = array();
        if($players_id){
            $users = $usersTable
                ->find()
                ->where(['player_id IN' => $players_id])
                ->toList();
        }
        
        $this->set(compact('club', 'users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $club = $this->Clubs->newEntity();
        if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->getData());
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The club could not be saved. Please, try again.'));
        }
        $files = $this->Articles->files->find('list', ['limit' => 200]);
        $this->set(compact('club', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Club id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->getData());
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The club could not be saved. Please, try again.'));
        }
        $files = $this->Clubs->files->find('list', ['limit' => 200]);
        $this->set(compact('club', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Club id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $club = $this->Clubs->get($id);
        if ($this->Clubs->delete($club)) {
            $this->Flash->success(__('The club has been deleted.'));
        } else {
            $this->Flash->error(__('The club could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
