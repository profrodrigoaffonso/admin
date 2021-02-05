<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Saints Model
 *
 * @method \App\Model\Entity\Saint get($primaryKey, $options = [])
 * @method \App\Model\Entity\Saint newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Saint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Saint|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saint saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Saint[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Saint findOrCreate($search, callable $callback = null, $options = [])
 */
class SaintsTable extends Table
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

        $this->setTable('saints');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        $validator
            ->scalar('biography')
            ->allowEmptyString('biography');

        return $validator;
    }
}
