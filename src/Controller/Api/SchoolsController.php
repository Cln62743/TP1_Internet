<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class SchoolsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

}
