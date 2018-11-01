<?php
// src/Model/Table/PlayerTournamentParticipationsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class PlayerTournamentParticipationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->setPrimaryKey('player_id', 'tournament_id');
        
        $this->belongsTo('Players', [
            'foreignKey' => 'player_id'
        ]);
        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournaments_id'
        ]);
        
    }
    
    public function validationDefault(Validator $validator)
    {

        return $validator;
    }
    
     public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['player_id'], 'Players'));
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));

        return $rules;
    }
}