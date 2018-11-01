<?php
// src/Model/Entity/Tournament.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tournament extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'players' => true,
    ];
}