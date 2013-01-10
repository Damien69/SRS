<?php

namespace Srs\NewsBundle\Entity;

use Srs\TagBundle\Entity\Tag;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Srs\NewsBundle\Entity\News
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Srs\NewsBundle\Entity\NewsRepository")
 */
class News
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
     * @var string $title
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

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
     * @ORM\ManyToMany(targetEntity="Srs\TagBundle\Entity\Tag" , inversedBy="news", cascade={"persist"})
     */
    private $tags;
    
    /**
     * @ORM\OneToMany(targetEntity="Srs\CommentBundle\Entity\Comment", mappedBy="news", cascade={"persist"})
     */
    private $comments;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autor = 'Damien';
        $this->dateCreation = new \Datetime;
        $this->dateModification = new \Datetime;
        $this->tags = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return News
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
     * @return News
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
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return News
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

    /**
     * Set autor
     *
     * @param string $autor
     * @return News
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
     * Add tags
     *
     * @param Srs\TagBundle\Entity\Tag $tags
     * @return News
     */
    public function addTag(\Srs\TagBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
        $tags->addNews($this);
        return $this;
    }

    /**
     * Remove tags
     *
     * @param Srs\TagBundle\Entity\Tag $tags
     */
    public function removeTag(\Srs\TagBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
        $tags->addNews(null);
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add comments
     *
     * @param Srs\CommentBundle\Entity\Comment $comments
     * @return News
     */
    public function addComment(\Srs\CommentBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param Srs\CommentBundle\Entity\Comment $comments
     */
    public function removeComment(\Srs\CommentBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}