<?php
namespace LeoGalleguillos\ProjectManagementTest\Model\Table;

use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\Test\TableTestCase;

class TaskStatusTest extends TableTestCase
{
    protected function setUp()
    {
        $this->taskStatusTable = new ProjectManagementTable\TaskStatus($this->getAdapter());

        $this->dropTable('task_status');
        $this->createTable('task_status');
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ProjectManagementTable\TaskStatus::class,
            $this->taskStatusTable
        );
    }

    public function testSelectWhereTaskStatusId()
    {
        $this->taskStatusTable->insert(
            'Open'
        );
        $this->taskStatusTable->insert(
            'In Progress'
        );

        $array = $this->taskStatusTable->selectWhereTaskStatusId(1);
        $this->assertSame(
            '1',
            $array['task_status_id']
        );
        $this->assertSame(
            'Open',
            $array['name']
        );

        $array = $this->taskStatusTable->selectWhereTaskStatusId(2);
        $this->assertSame(
            '2',
            $array['task_status_id']
        );
        $this->assertSame(
            'In Progress',
            $array['name']
        );
    }
}
