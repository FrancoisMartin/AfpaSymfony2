<?php

namespace Afpa\CatalogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product/1');

        $this->assertTrue($crawler->filter('html:contains("produit n° 1")')->count() > 0);
    }
}
