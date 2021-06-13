<?php
namespace LeoGalleguillos\ProjectManagementTest\Model\Service;

use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use LeoGalleguillos\ProjectManagement\Model\Table as ProjectManagementTable;
use LeoGalleguillos\User\Model\Service as UserService;
use PHPUnit\Framework\TestCase;

class CreateFromPostTest extends TestCase
{
    protected function setUp(): void
    {
        $this->flashService = new FlashService\Flash();
        $this->taskTableMock = $this->createMock(
            ProjectManagementTable\Task::class
        );
        $this->loggedInUserServiceMock = $this->createMock(
            UserService\LoggedInUser::class
        );
        $this->createFromPostService = new ProjectManagementService\Task\CreateFromPost(
            $this->flashService,
            $this->taskTableMock,
            $this->loggedInUserServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ProjectManagementService\Task\CreateFromPost::class,
            $this->createFromPostService
        );
    }
}
