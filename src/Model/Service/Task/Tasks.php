<?php
namespace LeoGalleguillos\ProjectManagement\Model\Service\Task;

use Generator;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\ProjectManagement\Model\Factory as ProjectManagementFactory;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;

class Tasks
{
    /**
     * Construct.
     *
     * @param ProjectManagementFactory\Task $taskFactory
     * @param ProjectManagementTable\Task $taskTable
     */
    public function __construct(
        ProjectManagementFactory\Task $taskFactory,
        ProjectManagementTable\Task $taskTable
    ) {
        $this->taskFactory = $taskFactory;
        $this->taskTable   = $taskTable;
    }

    /**
     * Get tasks.
     *
     * @param BusinessEntity\Business $businessEntity
     * @return Generator
     * @yield ProjectManagementEntity\Task
     */
    public function getTasks(
        BusinessEntity\Business $businessEntity
    ): Generator {
        $arrays = $this->taskTable->selectWhereBusinessId(
            $businessEntity->getBusinessId()
        );

        foreach ($arrays as $array) {
            yield $this->taskFactory->buildFromArray($array);
        }
    }
}
