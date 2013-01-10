<?php

namespace Srs\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srs\NewsBundle\Entity\News;
use Srs\TagBundle\Entity\Tag;
use Srs\NewsBundle\Form\NewsType;

/**
 * News controller.
 *
 */
class NewsController extends Controller
{
    /**
     * Lists all News entities.
     *
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()
                            ->getEntityManager()
                            ->getRepository('SrsNewsBundle:News')
                            ->findBy(array(),
                                    array('dateCreation' => 'desc'));
           
        return $this->render('SrsNewsBundle:News:index.html.twig', array(
            'news' => $news
        ));
    }
   
    public function showAction(News $news)
    {
        return $this->render('SrsNewsBundle:News:show.html.twig', array(
            'news' => $news
        ));
    }
    
    public function modifyAction(News $news){
        
        $form = $this->createForm(new NewsType, $news);
        
        $request = $this->get('request');
        
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);

            if( $form->isValid() )
            {
                $news->setDateModification(new \Datetime);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($news);
                $em->flush();

                return $this->redirect($this->generateUrl('srs_news_show', array('id' => $news->getId())));
            }
        }
        
        return $this->render('SrsNewsBundle:News:modify.html.twig', array(
            'form' => $form->createView(),
            'news' => $news,
        ));
    }
    
    public function addAction(){
        
        $entity  = new News();
        $request = $this->getRequest();
        $form    = $this->createForm(new NewsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('srs_news_show', array('id' => $entity->getId())));
            
        }
        return $this->render('SrsNewsBundle:News:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }
    
    public function removeAction(News $news)
    {
        if( $this->get('request')->getMethod() == 'POST' )
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($news);
            $em->flush();

            $this->get('session')->setFlash('info', 'La news a bien supprimé');

            return $this->redirect( $this->generateUrl('srs_news_index') );
        }
        
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer.
        return $this->render('SrsNewsBundle:News:remove.html.twig', array(
            'news' => $news
        ));
    }    
}
