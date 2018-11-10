<?php
// src/Model/Table/TournamentsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class TournamentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', ['field' => ['name']]);
        
        $this->belongsToMany('Players', [
            'foreignKey' => 'tournament_id',
            'targetForeignKey' => 'player_id',
            'joinTable' => 'player_tournament_participations'
        ]);
        
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);
    }
    
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->minLength('name', 5)
            ->maxLength('name', 50)

            ->notEmpty('start_date')
            ->date('start_date')
            
            ->notEmpty('end_date')
            ->date('end_date');
        return $validator;
    }
}