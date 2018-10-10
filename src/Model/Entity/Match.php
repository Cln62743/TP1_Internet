<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity
 *
 * @property int $tournament_id
 * @property int $player_id_1
 * @property int $player_id_2
 * @property \Cake\I18n\FrozenDate $start_time
 * @property \Cake\I18n\FrozenDate $end_time
 * @property int $result_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\RefResult $ref_result
 */
class Match extends Entity
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
        'end_time' => true,
        'result_id' => true,
        'created' => true,
        'modified' => true,
        'tournament' => true,
        'ref_result' => true
    ];
}
