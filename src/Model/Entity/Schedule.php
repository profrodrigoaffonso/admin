<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int|null $command_id
 * @property string|null $command_send
 * @property string|null $type
 * @property \Cake\I18n\FrozenTime|null $date_time
 * @property string|null $specific_date
 * @property string|null $days_week
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Command $command
 */
class Schedule extends Entity
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
        'command_id' => true,
        'command_send' => true,
        'type' => true,
        'date_time' => true,
        'specific_date' => true,
        'days_week' => true,
        'created' => true,
        'modified' => true,
        'command' => true,
    ];
}
