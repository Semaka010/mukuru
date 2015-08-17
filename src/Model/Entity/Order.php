<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'currency_id' => true,
        'exchange_rate' => true,
        'amount_requsted' => true,
        'amount_paid' => true,
        'surcharge_amount' => true,
        'currency' => true,
    ];
}
