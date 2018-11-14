<?php
namespace LeoGalleguillos\ProjectManagement\Model\Service\Task;

use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\String\Model\Service as StringService;

class RootRelativeUrl
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Get root relative URL.
     *
     * @param ProjectManagementEntity\Task $taskEntity
     * @return string
     */
    public function getRootRelativeUrl(
        ProjectManagementEntity\Task $taskEntity
    ) : string {
        return '/project-management/tasks/'
             . $taskEntity->getTaskId()
             . '/'
             . $this->urlFriendlyService->getUrlFriendly($taskEntity->getName());
    }
}
