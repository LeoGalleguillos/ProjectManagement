<?php
namespace LeoGalleguillos\ProjectManagement\View\Helper\Task;

use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use Zend\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param ProjectManagementService\Task\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        ProjectManagementService\Task\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    /**
     * Invoke
     *
     * @param ProjectManagementEntity\Task $taskEntity
     * @return string
     */
    public function __invoke(ProjectManagementEntity\Task $taskEntity)
    {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $taskEntity
        );
    }
}
