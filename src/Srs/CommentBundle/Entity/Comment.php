<?php

namespace Srs\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Srs\CommentBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Srs\CommentBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $autor
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string $body
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime $dateCreation
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    
    /**
     * @var \DateTime $dateModification
     *
     * @ORM\Column(name="dateModification", type="datetime",nullable=true)
     */    
    private $dateModification;

    /**
     * @ORM\ManyToOne(targetEntity="Srs\NewsBundle\Entity\News")
     * @ORM\JoinColumn(nullable=false)
     */
    private $news;
    
    public function __construct()
    {
        $this->autor = 'Damien';
        $this->dateCreation = new \Datetime;
        $this->dateModification = new \Datetime;
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Comment
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    
        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Comment
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set news
     *
     * @param Srs\NewsBundle\Entity\News $news
     * @return Comment
     */
    public function setNews(\Srs\NewsBundle\Entity\News $news)
    {
        $this->news = $news;
    
        return $this;
    }

    /**
     * Get news
     *
     * @return Srs\NewsBundle\Entity\News 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Comment
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    
        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }
}