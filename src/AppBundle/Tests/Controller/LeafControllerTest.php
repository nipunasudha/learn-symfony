<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LeafControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/leaf/list');
    }

    public function testAddleaf()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/leaf/add');
    }

}
