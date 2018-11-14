<?php
namespace LeoGalleguillos\ProjectManagementTest\Service\Task;

use LeoGalleguillos\ProjectManagement\Model\Entity as ProjectManagementEntity;
use LeoGalleguillos\ProjectManagement\Model\Service as ProjectManagementService;
use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class RootRelativeUrlTest extends TestCase
{
    protected function setUp()
    {
        $this->urlFriendlyService = new StringService\UrlFriendly();
        $this->rootRelativeUrlService = new ProjectManagementService\Task\RootRelativeUrl(
            $this->urlFriendlyService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ProjectManagementService\Task\RootRelativeUrl::class,
            $this->rootRelativeUrlService
        );
    }

    public function testGetRootRelativeUrl()
    {
        $taskEntity = new ProjectManagementEntity\Task();
        $taskEntity->setTaskId(54321)
                   ->setName('This is the name!');

        $rru = $this->rootRelativeUrlService->getRootRelativeUrl($taskEntity);

        $this->assertSame(
            '/project-management/tasks/54321/This-is-the-name',
            $rru
        );
    }
}
