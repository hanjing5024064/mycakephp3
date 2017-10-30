<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WechatGzhsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WechatGzhsTable Test Case
 */
class WechatGzhsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WechatGzhsTable
     */
    public $WechatGzhs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wechat_gzhs',
        'app.user_wechat_openids',
        'app.user_wechats',
        'app.users',
        'app.roles',
        'app.actions',
        'app.roles_actions',
        'app.users_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WechatGzhs') ? [] : ['className' => 'App\Model\Table\WechatGzhsTable'];
        $this->WechatGzhs = TableRegistry::get('WechatGzhs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WechatGzhs);

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
}
