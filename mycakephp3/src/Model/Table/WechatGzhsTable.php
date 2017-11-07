<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WechatGzhs Model
 *
 * @property \App\Model\Table\UserWechatOpenidsTable|\Cake\ORM\Association\HasMany $UserWechatOpenids
 *
 * @method \App\Model\Entity\WechatGzh get($primaryKey, $options = [])
 * @method \App\Model\Entity\WechatGzh newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WechatGzh[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WechatGzh|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WechatGzh patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WechatGzh[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WechatGzh findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WechatGzhsTable extends Table
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

        $this->setTable('wechat_gzhs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserWechatOpenids', [
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('appid')
            ->requirePresence('appid', 'create')
            ->notEmpty('appid');

        $validator
            ->scalar('secret')
            ->requirePresence('secret', 'create')
            ->notEmpty('secret');

        $validator
            ->scalar('token')
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        $validator
            ->scalar('oauth_scopes')
            ->allowEmpty('oauth_scopes');

        $validator
            ->scalar('oauth_callback')
            ->allowEmpty('oauth_callback');

        $validator
            ->scalar('payment')
            ->allowEmpty('payment');

        $validator
            ->scalar('menu')
            ->allowEmpty('menu');

        $validator
            ->scalar('template')
            ->allowEmpty('template');

        $validator
            ->scalar('subscribemsg')
            ->allowEmpty('subscribemsg');

        return $validator;
    }
}
