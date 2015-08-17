<?php
namespace App\Model\Table;

use App\Model\Entity\Order;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Currencies
 */
class OrdersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER'
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
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
            
        $validator
            ->add('exchange_rate', 'valid', ['rule' => 'decimal'])
            ->requirePresence('exchange_rate', 'create')
            ->notEmpty('exchange_rate');
            
        $validator
            ->add('amount_requsted', 'valid', ['rule' => 'decimal'])
            ->requirePresence('amount_requsted', 'create')
            ->notEmpty('amount_requsted');
            
        $validator
            ->add('amount_paid', 'valid', ['rule' => 'decimal'])
            ->requirePresence('amount_paid', 'create')
            ->notEmpty('amount_paid');
            
        $validator
            ->add('surcharge_amount', 'valid', ['rule' => 'decimal'])
            ->requirePresence('surcharge_amount', 'create')
            ->notEmpty('surcharge_amount');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        return $rules;
    }
}
