<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitorIpsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitorIpsTable Test Case
 */
class VisitorIpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitorIpsTable
     */
    protected $VisitorIps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.VisitorIps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VisitorIps') ? [] : ['className' => VisitorIpsTable::class];
        $this->VisitorIps = $this->getTableLocator()->get('VisitorIps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VisitorIps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VisitorIpsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
