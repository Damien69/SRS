<?php

namespace Srs\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Srs\CommentBundle\Entity\Comment;
use Srs\CommentBundle\Form\CommentType;


class CommentController extends Controller
{
    
    public function addAction()
    {
        $entity  = new Comment();
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('srs_news_index'));
            
        }
        return $this->render('SrsCommentBundle:Comment:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }
    
    public function modifyAction(Comment $news){
        
        $form = $this->createForm(new CommentType, $news);
        
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
        
        return $this->render('SrsCommentBundle:Comment:modify.html.twig', array(
            'form' => $form->createView(),
            'news' => $news,
        ));
    }
    
    public function removeAction(Comment $news)
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
        return $this->render('SrsCommentBundle:Comment:remove.html.twig', array(
            'news' => $news
        ));
    }
}
