<?php 
namespace Srs\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Srs\EventBundle\Entity\Event;
use Srs\EventBundle\Form\EventType;


/**
 * News controller.
 *
 */
class EventController extends Controller
{
    public function indexAction(){
          
        //return new Response("Index Event");
        return $this->render('SrsEventBundle:Event:index.html.twig', array('event' => 'monPremierEvent'));
    }
    
    public function showAction(event $event){
        
        return $this->render('SrsEventBundle:Event:show.html.twig');
    }
    
    /*
     * Il faut que tu passes par un formulaire prend exemple sur ceux que l'on à déjà créé
     */
    public function addAction(){
        $event = new Event();
        $event->setTitle("titreTest");
        $event->setBody("on essai");
        
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($event);
        
        $em->flush();
        
        
        
    }
    /*
     * Même chose que addAction
     */
    public function modifyAction(event $event){
        
        return $this->render('SrsEventBundle:Event:modify.html.twig');
    }
    
    /*
     * Même chose que addAction
     */
    public function removeAction(event $event){
        
        return $this->render('SrsEventBundle:Event:remove.html.twig');
    }
    
    
}
?>
