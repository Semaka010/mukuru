<?php
namespace App\Model\Table;

use App\Model\Entity\ExchangeRate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExchangeRates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Currencies
 */
class ExchangeRatesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('exchange_rates');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Currencies', [
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
            ->add('date_time', 'valid', ['rule' => 'datetime'])
            ->requirePresence('date_time', 'create')
            ->notEmpty('date_time');
            
        $validator
            ->add('rate', 'valid', ['rule' => 'decimal'])
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

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
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        return $rules;
    }
}
