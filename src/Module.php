<?php
namespace LeoGalleguillos\ProjectManagement;

use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\ProjectManagement\Model\Factory as ProjectManagementFactory;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\ProjectManagement\View\Helper as ProjectManagementHelper;
use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\User\Model\Factory as UserFactory;
use LeoGalleguillos\User\Model\Service as UserService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getTaskRootRelativeUrl' => ProjectManagementHelper\Task\RootRelativeUrl::class,
                ],
                'factories' => [
                    ProjectManagementHelper\Task\RootRelativeUrl::class => function ($sm) {
                        return new ProjectManagementHelper\Task\RootRelativeUrl(
                            $sm->get(ProjectManagementService\Task\RootRelativeUrl::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ProjectManagementFactory\Task::class => function ($sm) {
                    return new ProjectManagementFactory\Task(
                        $sm->get(ProjectManagementFactory\TaskStatus::class),
                        $sm->get(ProjectManagementTable\Task::class),
                        $sm->get(UserFactory\User::class)
                    );
                },
                ProjectManagementFactory\TaskStatus::class => function ($sm) {
                    return new ProjectManagementFactory\TaskStatus(
                        $sm->get(ProjectManagementTable\TaskStatus::class)
                    );
                },
                ProjectManagementService\Task\CreateFromPost::class => function ($sm) {
                    return new ProjectManagementService\Task\CreateFromPost(
                        $sm->get(FlashService\Flash::class),
                        $sm->get(ProjectManagementTable\Task::class),
                        $sm->get(UserService\LoggedInUser::class)
                    );
                },
                ProjectManagementService\Task\RootRelativeUrl::class => function ($sm) {
                    return new ProjectManagementService\Task\RootRelativeUrl(
                        $sm->get(StringService\UrlFriendly::class)
                    );
                },
                ProjectManagementService\Task\Tasks::class => function ($sm) {
                    return new ProjectManagementService\Task\Tasks(
                        $sm->get(ProjectManagementFactory\Task::class),
                        $sm->get(ProjectManagementTable\Task::class)
                    );
                },
                ProjectManagementTable\Task::class => function ($serviceManager) {
                    return new ProjectManagementTable\Task(
                        $serviceManager->get('project-management')
                    );
                },
                ProjectManagementTable\TaskStatus::class => function ($serviceManager) {
                    return new ProjectManagementTable\TaskStatus(
                        $serviceManager->get('project-management')
                    );
                },
            ],
        ];
    }
}
