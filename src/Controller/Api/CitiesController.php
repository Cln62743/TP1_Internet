<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class CitiesController extends AppController {

    /*public function initialize() {
        parent::initialize();
        
    }*/
    
    public function index()
    {
        $cities = $this->paginate($this->Cities);
        $this->set(compact('cities'));
    }
    
    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name', 'description'
        ],
*/      'sortWhitelist' => [
            'id', 'name'
        ]
    ];
    
}