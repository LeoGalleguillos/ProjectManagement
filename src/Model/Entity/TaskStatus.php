<?php
namespace LeoGalleguillos\Business\Model\Entity;

use LeoGalleguillos\Business\Model\Entity as ProjectManagementEntity;

class TaskStatus
{
    protected $taskStatusId;
    protected $name;

    public function getTaskStatusId() : int
    {
        return $this->taskStatusId;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setTaskStatusId(int $taskStatusId) : ProjectManagementEntity\TaskStatus
    {
        $this->taskStatusId = $taskStatusId;
        return $this;
    }

    public function setName(string $name) : ProjectManagementEntity\TaskStatus
    {
        $this->name = $name;
        return $this;
    }
}
