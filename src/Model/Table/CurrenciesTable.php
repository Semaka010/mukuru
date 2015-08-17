<?php
namespace App\Model\Table;

use App\Model\Entity\Currency;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Currencies Model
 *
 * @property \Cake\ORM\Association\HasMany $ExchangeRates
 * @property \Cake\ORM\Association\HasMany $Orders
 */
class CurrenciesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('currencies');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('ExchangeRates', [
            'foreignKey' => 'currency_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'currency_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->add('surcharge', 'valid', ['rule' => 'decimal'])
            ->requirePresence('surcharge', 'create')
            ->notEmpty('surcharge');
            
        $validator
            ->add('discount', 'valid', ['rule' => 'decimal'])
            ->requirePresence('discount', 'create')
            ->notEmpty('discount');

        return $validator;
    }
}
