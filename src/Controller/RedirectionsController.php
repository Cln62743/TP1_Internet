<?php


namespace App\Controller;
use Cake\Event\Event;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RedirectionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'player':
                $this->Auth->allow(['index', 'aPropos']);
                break;
            case 'admin':
                $this->Auth->allow(['index', 'afterTournamentAdd', 'aPropos']);
                break;
            }
        } else {
            $this->Auth->allow(['index']);
        }    
    }

    public function index()
    {
        $user = $this->Auth->user();
        
        if (!$user){
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
        
        switch($user['role']){
            case "player":
                return $this->redirect(['controller' => 'tournaments', 'action' => 'index']);
            case "admin":
                return $this->redirect(['controller' => 'tournaments', 'action' => 'index']);
        }
        return $this->redirect(['controller' => 'users', 'action' => 'login']);
    }

    public function afterTournamentAdd()
    {
        return $this->redirect(['controller' => 'tournaments', 'action' => 'index']);
    }
    
    public function aPropos(){}
}