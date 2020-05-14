<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acessos Model
 *
 * @property \App\Model\Table\SitesTable&\Cake\ORM\Association\BelongsTo $Sites
 *
 * @method \App\Model\Entity\Acesso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acesso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acesso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acesso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acesso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acesso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acesso findOrCreate($search, callable $callback = null, $options = [])
 */
class AcessosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('acessos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 50)
            ->allowEmptyString('ip');

        $validator
            ->dateTime('data_hora')
            ->allowEmptyDateTime('data_hora');

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
        $rules->add($rules->existsIn(['site_id'], 'Sites'));

        return $rules;
    }
}
