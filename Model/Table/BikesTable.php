<?php
namespace App\Model\Table;

use App\Model\Entity\Boat;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Bikes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Wps
 * @property \Cake\ORM\Association\BelongsTo $Sources
 * @property \Cake\ORM\Association\BelongsToMany $Sources
 */
class BikesTable extends Table
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

        $this->table('bikes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'revised' => 'always',
                ]
            ]
        ]);
        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id'
        ]);
		
        $this->belongsToMany('Sources', [
            'foreignKey' => 'bike_id',
            'targetForeignKey' => 'source_id',
            'joinTable' => 'bikes_sources'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->numeric('lat')
            ->allowEmpty('lat');

        $validator
            ->numeric('lon')
            ->allowEmpty('lon');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('town');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('zip');

        $validator
            ->allowEmpty('source');

        $validator
            ->allowEmpty('comment');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('json');

        $validator
            ->dateTime('revised');

		$validator
            ->dateTime('created');

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
        $rules->add($rules->existsIn(['source_id'], 'Sources'));
        return $rules;
    }
}
