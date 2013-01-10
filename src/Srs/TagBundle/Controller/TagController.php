<?php

namespace Srs\TagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srs\TagBundle\Entity\Tag;
use Srs\NewsBundle\Entity\News;

class TagController extends Controller
{
    public function indexAction(Tag $tags){        
        return $this->render('SrsTagBundle:Tag:index.html.twig', array(
            'tags' => $tags
        ));
    }
    
    public function testAction(){
        $news1 = new news();
        $news2 = new news();
        
        $tag1 = new tag();
        $tag2 = new tag();
        
        $tag1->setName('labeln1');
        $tag2->setName('Labeln2');
        
        $news1->setTitle('Initialisation');
        $news1->setBody('Je vais essayer d\'insérer des tags associés à une news manuellement');
        
        $news2->setTitle('Compléement de la phase initialisation');
        $news2->setBody('Je vais essayer d\'insérer des tags associés à une news manuellement');
        
        $tag2->addNews($news1);
        $tag2->addNews($news2);

    }
}
