<?php
namespace App\Model\Table;

use App\Model\Entity\Source;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sources Model
 *
 * @property \Cake\ORM\Association\HasMany $Boats
 * @property \Cake\ORM\Association\BelongsToMany $Boats
 */
class SourcesTable extends Table
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

        $this->table('sources');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Boats', [
            'foreignKey' => 'source_id'
        ]);
        $this->belongsToMany('Boats', [
            'foreignKey' => 'source_id',
            'targetForeignKey' => 'boat_id',
            'joinTable' => 'boats_sources'
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
            ->allowEmpty('description');

        $validator
            ->allowEmpty('url');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        return $validator;
    }
}
