<?php
namespace LeoGalleguillos\ProjectManagement\Model\Entity;

use DateTime;
use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class Task
{
    protected $businessId;
    protected $created;
    protected $description;
    protected $summary;
    protected $taskStatusEntity;
    protected $userId;
    protected $views;

    public function getBusinessId() : int
    {
        return $this->businessId;
    }

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getSummary() : string
    {
        return $this->summary;
    }

    public function getTaskId() : int
    {
        return $this->taskId;
    }

    public function getTaskStatusEntity() : ProjectManagementEntity\TaskStatus
    {
        return $this->taskStatusEntity;
    }

    public function getUserEntity() : UserEntity\User
    {
        return $this->userEntity;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function getViews() : int
    {
        return $this->views;
    }

    public function setBusinessId(int $businessId) : ProjectManagementEntity\Task
    {
        $this->businessId = $businessId;
        return $this;
    }

    public function setCreated(DateTime $created) : ProjectManagementEntity\Task
    {
        $this->created = $created;
        return $this;
    }

    public function setDescription(string $description) : ProjectManagementEntity\Task
    {
        $this->description = $description;
        return $this;
    }

    public function setName(string $name) : ProjectManagementEntity\Task
    {
        $this->name = $name;
        return $this;
    }

    public function setSummary(string $summary) : ProjectManagementEntity\Task
    {
        $this->summary = $summary;
        return $this;
    }

    public function setTaskId(int $taskId) : ProjectManagementEntity\Task
    {
        $this->taskId = $taskId;
        return $this;
    }

    public function setTaskStatusEntity(
        ProjectManagementEntity\TaskStatus $taskStatusEntity
    ) : ProjectManagementEntity\Task {
        $this->taskStatusEntity = $taskStatusEntity;
        return $this;
    }

    public function setUserEntity(UserEntity\User $userEntity) : ProjectManagementEntity\Task
    {
        $this->userEntity = $userEntity;
        return $this;
    }

    public function setUserId(int $userId) : ProjectManagementEntity\Task
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views) : ProjectManagementEntity\Task
    {
        $this->views = $views;
        return $this;
    }
}
