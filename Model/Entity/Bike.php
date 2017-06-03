<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bike Entity.
 *
 * @property int $id
 * @property int $wp_id
 * @property string $name
 * @property float $lat
 * @property float $lon
 * @property string $type
 * @property string $town
 * @property string $state
 * @property string $zip
 * @property string $source
 * @property int $source_id
 * @property string $comment
 * @property string $url
 * @property string $description
 * @property string $json
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $revised
 * @property \App\Model\Entity\Source[] $sources
 */
class Bike extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
