<?php

namespace Srs\TagBundle\Entity;

use Srs\NewsBundle\Entity\News;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Srs\NewsBundle\Entity\Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Srs\TagBundle\Entity\TagRepository")
 */
class Tag
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="Srs\NewsBundle\Entity\News", mappedBy="tag")
     */
    private $news;
    
    public function __construct(){
        $this->news = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Add news
     *
     * @param Srs\NewsBundle\Entity\News $news
     * @return Tag
     */
    public function addNews(\Srs\NewsBundle\Entity\News $news)
    {
        $this->news[] = $news;
    
        return $this;
    }

    /**
     * Remove news
     *
     * @param Srs\NewsBundle\Entity\News $news
     */
    public function removeNews(\Srs\NewsBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Add news
     *
     * @param \Srs\NewsBundle\Entity\News $news
     * @return Tag
     */
    public function addNew(\Srs\NewsBundle\Entity\News $news)
    {
        $this->news[] = $news;
    
        return $this;
    }

    /**
     * Remove news
     *
     * @param \Srs\NewsBundle\Entity\News $news
     */
    public function removeNew(\Srs\NewsBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }
}