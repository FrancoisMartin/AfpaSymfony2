<?php

namespace Afpa\MenuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Running")')->count() > 0);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
