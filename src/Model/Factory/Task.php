<?php
namespace LeoGalleguillos\ProjectManagement\Model\Factory;

use DateTime;
use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Factory as ProjectManagementFactory;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\User\Model\Factory as UserFactory;

class Task
{
    public function __construct(
        ProjectManagementFactory\TaskStatus $taskStatusFactory,
        ProjectManagementTable\Task $taskTable,
        UserFactory\User $userFactory
    ) {
        $this->taskStatusFactory = $taskStatusFactory;
        $this->taskTable         = $taskTable;
        $this->userFactory       = $userFactory;
    }

    public function buildFromTaskId(int $taskId): ProjectManagementEntity\Task
    {
        $array = $this->taskTable->selectWhereTaskId(
            $taskId
        );

        return $this->buildFromArray($array);
    }

    public function buildFromArray(array $array): ProjectManagementEntity\Task
    {
        $taskEntity = new ProjectManagementEntity\Task();
        $taskEntity->setBusinessId($array['business_id'])
                   ->setCreated(new DateTime($array['created']))
                   ->setDescription($array['description'])
                   ->setName($array['name'])
                   ->setTaskId($array['task_id'])
                   ->setViews((int) $array['views']);

        $taskEntity->setUserEntity(
            $this->userFactory->buildFromUserId($array['user_id'])
        );

        if (isset($array['task_status_id'])) {
            $taskStatusEntity = $this->taskStatusFactory->buildFromTaskStatusId(
                $array['task_status_id']
            );
            $taskEntity->setTaskStatusEntity($taskStatusEntity);
        }

        return $taskEntity;
    }
}
