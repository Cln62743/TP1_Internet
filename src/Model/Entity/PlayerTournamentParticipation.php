<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlayerTournamentParticipation Entity
 *
 * @property int $player_id
 * @property int $tournament_id
 * @property string $final_result
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tournament $tournament
 */
class PlayerTournamentParticipation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'final_result' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'tournament' => true
    ];
}
