<?php

namespace Srs\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Srs\CommentBundle\Entity\Comment;
use Srs\CommentBundle\Form\CommentType;


class CommentController extends Controller
{
    
    public function modifyAction(Comment $comment){
        
        $form = $this->createForm(new CommentType, $comment);
        
        $request = $this->get('request');
        
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);

            if( $form->isValid() )
            {
                $comment->setDateModification(new \Datetime);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($comment);
                $em->flush();
                
                $news=$comment->getNews();
                return $this->redirect($this->generateUrl('srs_news_show', array('id' => $news->getId())));
            }
        }
        
        return $this->render('SrsCommentBundle:Comment:modify.html.twig', array(
            'form' => $form->createView(),
            'comment' => $comment,
        ));
    }
    
    public function removeAction(Comment $comment)
    {
        if( $this->get('request')->getMethod() == 'POST' )
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($comment);
            $em->flush();

            $this->get('session')->setFlash('info', 'Le commentaire a bien supprimé');
            
            $news=$comment->getNews();
            return $this->redirect($this->generateUrl('srs_news_show', array('id' => $news->getId())));
        }
        
        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer.
        return $this->render('SrsCommentBundle:Comment:remove.html.twig', array(
            'comment' => $comment
        ));
    }
}
