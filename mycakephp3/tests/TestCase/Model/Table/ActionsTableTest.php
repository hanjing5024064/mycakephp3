<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActionsTable Test Case
 */
class ActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActionsTable
     */
    public $Actions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actions',
        'app.roles',
        'app.roles_actions',
        'app.users',
        'app.user_wechats',
        'app.user_wechat_openids',
        'app.wechat_gzhs',
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
        $config = TableRegistry::exists('Actions') ? [] : ['className' => ActionsTable::class];
        $this->Actions = TableRegistry::get('Actions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Actions);

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
