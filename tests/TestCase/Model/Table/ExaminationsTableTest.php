<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminationsTable Test Case
 */
class ExaminationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminationsTable
     */
    public $Examinations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Examinations',
        'app.Appointments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Examinations') ? [] : ['className' => ExaminationsTable::class];
        $this->Examinations = TableRegistry::getTableLocator()->get('Examinations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examinations);

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
