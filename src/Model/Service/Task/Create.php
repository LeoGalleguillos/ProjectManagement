<?php
namespace LeoGalleguillos\ProjectManagement\Model\Service\Task;

use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class Create
{
    /**
     * Construct.
     *
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        ProjectManagementTable\Task $taskTable
    ) {
        $this->taskTable = $taskTable;
    }

    public function create(
        BusinessEntity\Business $businessEntity,
        UserEntity\User $userEntity,
        string $name,
        string $description
    ) : int {
        return $this->taskTable->insert(
            $businessEntity->getBusinessId(),
            $userEntity->getUserId(),
            $name,
            $description
        );
    }
}
