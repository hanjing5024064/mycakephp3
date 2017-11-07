<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserWechatOpenidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserWechatOpenidsTable Test Case
 */
class UserWechatOpenidsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserWechatOpenidsTable
     */
    public $UserWechatOpenids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_wechat_openids',
        'app.user_wechats',
        'app.users',
        'app.roles',
        'app.actions',
        'app.roles_actions',
        'app.users_roles',
        'app.wechat_gzhs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserWechatOpenids') ? [] : ['className' => UserWechatOpenidsTable::class];
        $this->UserWechatOpenids = TableRegistry::get('UserWechatOpenids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserWechatOpenids);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
