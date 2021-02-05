<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commands Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Command get($primaryKey, $options = [])
 * @method \App\Model\Entity\Command newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Command[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Command|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Command saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Command patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Command[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Command findOrCreate($search, callable $callback = null, $options = [])
 */
class CommandsTable extends Table
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

        $this->setTable('commands');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Schedules', [
            'foreignKey' => 'command_id',
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
            ->scalar('command')
            ->maxLength('command', 10)
            ->allowEmptyString('command');

        $validator
            ->scalar('executed')
            ->allowEmptyString('executed');

        return $validator;
    }
}
