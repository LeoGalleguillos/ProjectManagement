<?php
namespace LeoGalleguillos\ProjectManagement\Model\Service\Task;

use Exception;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\User\Model\Service as UserService;

class CreateFromPost
{
    public function __construct(
        FlashService\Flash $flashService,
        ProjectManagementTable\Task $taskTable,
        UserService\LoggedInUser $loggedInUserService
    ) {
        $this->flashService        = $flashService;
        $this->taskTable           = $taskTable;
        $this->loggedInUserService = $loggedInUserService;
    }

    public function createFromPost(
        BusinessEntity\Business $businessEntity
    ): int {
        $errors = [];

        $userEntity = $this->loggedInUserService->getLoggedInUser();

        if (empty($_POST['name'])) {
            $errors[] = 'Invalid task name.';
        } else {
            $this->flashService->set('name', $_POST['name']);
        }

        if (empty($_POST['description'])) {
            $errors[] = 'Invalid task description.';
        } else {
            $this->flashService->set('description', $_POST['description']);
        }

        if ($errors) {
            $this->flashService->set('errors', $errors);
            throw new Exception('Errors with post data.');
        }

        return $this->taskTable->insert(
            $businessEntity->getBusinessId(),
            $userEntity->getUserId(),
            $name,
            $description
        );
    }
}
