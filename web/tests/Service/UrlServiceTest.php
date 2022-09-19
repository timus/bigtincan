<?php

namespace Tests\App\Service;

use App\Entity\Url;
use App\Repository\UrlRepository;
use App\Service\UrlService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Mockery;
use DateTime;

/**
 * Class UrlServiceTest
 *
 * @package Tests\AppBundle\Service
 */
class UrlServiceTest extends KernelTestCase
{
    /**
     * @var UrlService $urlService
     */
    protected UrlService $urlService;

    /**
     * Set Up
     */
    protected function setUp(): void
    {
        $this->urlService = new UrlService(
            $this->mockUrlRepository()

        );
    }

   private function mockUrlRepository(){
       $urlRepository = Mockery::mock(UrlRepository::class)->makePartial();
       $urlRepository->shouldReceive('createUrl')->andReturn(new Url([
           'url' => 'testurl.com',
           'shortUrl' => 'asdf',
           'created' => new DateTime(),
           'modified' => new DateTime(),
           'deleted' => 0,
           'validHours' => 1
       ]));
   }

    /**
     * Test create Url
     */
    public function testCreate()
    {
        $this->assertTrue($this->urlService->create('testurl.com', '1') instanceof Url);
    }


}