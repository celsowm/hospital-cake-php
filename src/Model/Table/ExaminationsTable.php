<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examinations Model
 *
 * @property \App\Model\Table\AppointmentsTable|\Cake\ORM\Association\BelongsTo $Appointments
 *
 * @method \App\Model\Entity\Examination get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examination newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Examination[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examination|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examination|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examination[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examination findOrCreate($search, callable $callback = null, $options = [])
 */
class ExaminationsTable extends Table
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

        $this->setTable('examinations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Appointments', [
            'foreignKey' => 'appointment_id',
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

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
        $rules->add($rules->existsIn(['appointment_id'], 'Appointments'));

        return $rules;
    }
}
