<?php
namespace LeoGalleguillos\ProjectManagement\Model\Factory;

use DateTime;
use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;

class TaskStatus
{
    public function __construct(
        ProjectManagementTable\TaskStatus $taskStatusTable
    ) {
        $this->taskStatusTable = $taskStatusTable;
    }

    public function buildFromTaskStatusId(int $taskStatusId)
    {
        $array = $this->taskStatusTable->selectWhereTaskStatusId(
            $taskStatusId
        );

        return $this->buildFromArray($array);
    }

    public function buildFromArray(array $array): ProjectManagementEntity\TaskStatus
    {
        $taskStatusEntity = new ProjectManagementEntity\TaskStatus();
        $taskStatusEntity->setTaskStatusId($array['task_status_id'])
                         ->setName($array['name']);

        return $taskStatusEntity;
    }
}
