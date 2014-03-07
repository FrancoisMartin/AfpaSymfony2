<?php

namespace Afpa\CalculetteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/calculette/result/15');
        // print_r($client->getResponse()->getContent());
        $this->assertTrue($crawler->filter('html:contains("15")')->count() > 0);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


}
