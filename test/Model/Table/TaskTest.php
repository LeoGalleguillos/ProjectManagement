<?php
namespace LeoGalleguillos\ProjectManagementTest\Model\Table;

use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\Test\TableTestCase;

class TaskTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->taskTable = new ProjectManagementTable\Task($this->getAdapter());

        $this->dropTable('task');
        $this->createTable('task');
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ProjectManagementTable\Task::class,
            $this->taskTable
        );
    }
}
