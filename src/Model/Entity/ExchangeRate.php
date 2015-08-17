<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExchangeRate Entity.
 */
class ExchangeRate extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'currency_id' => true,
        'date_time' => true,
        'rate' => true,
        'currency' => true,
    ];
}
