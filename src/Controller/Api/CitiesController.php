<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class CitiesController extends AppController {
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
    
    