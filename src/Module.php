<?php
namespace LeoGalleguillos\ProjectManagement;

use LeoGalleguillos\ProjectManagement\Model\Factory as ProjectManagementFactory;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\ProjectManagement\View\Helper as ProjectManagementHelper;

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
                ProjectManagementTable\Task::class => function ($serviceManager) {
                    return new ProjectManagementTable\Task(
                        $serviceManager->get('project-management')
                    );
                },
            ],
        ];
    }
}
