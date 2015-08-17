<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Currency Entity.
 */
class Currency extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'surcharge' => true,
        'discount' => true,
        'exchange_rates' => true,
        'orders' => true,
    ];
}
