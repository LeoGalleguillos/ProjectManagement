<?php
namespace LeoGalleguillos\ProjectManagement\Model\Service\Task;

use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\User\Model\Service as UserService;

class CreateFromPost
{
    public function __construct(
        ProjectManagementTable\Task $taskTable,
        UserService\LoggedInUser $loggedInUserService
    ) {
        $this->taskTable           = $taskTable;
        $this->loggedInUserService = $loggedInUserService;
    }

    public function create(
        BusinessEntity\Business $businessEntity
    ): int {
        $userEntity = $this->loggedInUserService->getLoggedInUser();

        return $this->taskTable->insert(
            $businessEntity->getBusinessId(),
            $userEntity->getUserId(),
            $name,
            $description
        );
    }
}
