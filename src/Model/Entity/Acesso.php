<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acesso Entity
 *
 * @property int $id
 * @property int|null $site_id
 * @property string|null $ip
 * @property \Cake\I18n\FrozenTime|null $data_hora
 *
 * @property \App\Model\Entity\Site $site
 */
class Acesso extends Entity
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
        'site_id' => true,
        'ip' => true,
        'data_hora' => true,
        'site' => true,
        'pagina' => true,
    ];
}
