<?php
namespace LeoGalleguillos\ProjectManagement;

use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\ProjectManagement\Model\Factory as ProjectManagementFactory;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\ProjectManagement\View\Helper as ProjectManagementHelper;
use LeoGalleguillos\User\Model\Service as UserService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ProjectManagementService\Task\CreateFromPost::class => function ($sm) {
                    return new ProjectManagementService\Task\CreateFromPost(
                        $sm->get(FlashService\Flash::class),
                        $sm->get(ProjectManagementTable\Task::class),
                        $sm->get(UserService\LoggedInUser::class)
                    );
                },
                ProjectManagementTable\Task::class => function ($serviceManager) {
                    return new ProjectManagementTable\Task(
                        $serviceManager->get('project-management')
                    );
                },
            ],
        ];
    }
}
