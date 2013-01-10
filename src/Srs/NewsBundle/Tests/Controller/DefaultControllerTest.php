<?php

namespace Srs\NewsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Srs\NewsBundle\Entity\News;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        /*$client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);*/
        
        $test = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('SrsNewsBundle:News')
                        ->find(15);
        
        
    }
}
