<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserWechatOpenids Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserWechats
 * @property \Cake\ORM\Association\BelongsTo $WechatGzhs
 *
 * @method \App\Model\Entity\UserWechatOpenid get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserWechatOpenid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserWechatOpenid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserWechatOpenid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserWechatOpenid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserWechatOpenid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserWechatOpenid findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserWechatOpenidsTable extends Table
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

        $this->setTable('user_wechat_openids');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserWechats', [
            'foreignKey' => 'user_wechat_id'
        ]);
        $this->belongsTo('WechatGzhs', [
            'foreignKey' => 'wechat_gzh_id'
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
            ->allowEmpty('openid');

        $validator
            ->allowEmpty('uuid');

        $validator
            ->integer('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['user_wechat_id'], 'UserWechats'));
        $rules->add($rules->existsIn(['wechat_gzh_id'], 'WechatGzhs'));

        return $rules;
    }
}
