<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserWechatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserWechatsTable Test Case
 */
class UserWechatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserWechatsTable
     */
    public $UserWechats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_wechats',
        'app.users',
        'app.roles',
        'app.actions',
        'app.roles_actions',
        'app.users_roles',
        'app.user_wechat_openids'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserWechats') ? [] : ['className' => 'App\Model\Table\UserWechatsTable'];
        $this->UserWechats = TableRegistry::get('UserWechats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserWechats);

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
