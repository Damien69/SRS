<?php

namespace Srs\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srs\NewsBundle\Entity\News;
use Srs\EventBundle\Entity\Event;

class HomeController extends Controller
{
    public function indexAction(){
        
        $news = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('SrsNewsBundle:News')
                        ->findby(array(),
                                array('dateCreation' => 'desc'),
                                2,
                                0);
        
        $event = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('SrsEventBundle:Event')
                ->findby(array(),
                        array('dateEvent' => 'desc'),
                        2,
                        0);
        
        return $this->render('SrsHomeBundle:Home:index.html.twig', array(
            'news' => $news,
            'event' => $event
        ));
    }
}
