<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SysMenus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentSysMenus
 * @property \Cake\ORM\Association\HasMany $ChildSysMenus
 *
 * @method \App\Model\Entity\SysMenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\SysMenu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SysMenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SysMenu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SysMenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SysMenu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SysMenu findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class SysMenusTable extends Table
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

        $this->setTable('sys_menus');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentSysMenus', [
            'className' => 'SysMenus',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildSysMenus', [
            'className' => 'SysMenus',
            'foreignKey' => 'parent_id'
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
            ->allowEmpty('controller');

        $validator
            ->allowEmpty('action');

        $validator
            ->allowEmpty('menuorder');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentSysMenus'));

        return $rules;
    }
}
