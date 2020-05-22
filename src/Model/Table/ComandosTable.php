<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comandos Model
 *
 * @method \App\Model\Entity\Comando get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comando newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comando[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comando|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comando saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comando patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comando[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comando findOrCreate($search, callable $callback = null, $options = [])
 */
class ComandosTable extends Table
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

        $this->setTable('comandos');
        $this->setDisplayField('id');
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
            ->scalar('comando')
            ->maxLength('comando', 50)
            ->allowEmptyString('comando');

        return $validator;
    }
}
