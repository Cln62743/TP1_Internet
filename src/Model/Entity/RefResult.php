<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefResult Entity
 *
 * @property int $id
 * @property string $result_description
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 */
class RefResult extends Entity
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
        'result_description' => true,
        'created' => true,
        'modified' => true
    ];
}
