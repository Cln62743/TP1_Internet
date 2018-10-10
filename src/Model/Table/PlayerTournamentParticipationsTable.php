<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlayerTournamentParticipations Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TournamentsTable|\Cake\ORM\Association\BelongsTo $Tournaments
 *
 * @method \App\Model\Entity\PlayerTournamentParticipation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerTournamentParticipation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlayerTournamentParticipationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('player_tournament_participations');
        $this->setDisplayField('player_id');
        $this->setPrimaryKey(['player_id', 'tournament_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'player_id',
            'joinType' => 'INNER',
            'dependent' => 'true'
        ]);
        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournament_id',
            'joinType' => 'INNER',
            'dependent' => 'true'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('final_result')
            ->maxLength('final_result', 255)
            ->requirePresence('final_result', 'create')
            ->notEmpty('final_result');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['player_id'], 'Users'));
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));

        return $rules;
    }
}
