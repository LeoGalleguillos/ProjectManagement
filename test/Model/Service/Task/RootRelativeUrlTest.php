<?php
namespace LeoGalleguillos\ProjectManagementTest\Service\Task;

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
}
