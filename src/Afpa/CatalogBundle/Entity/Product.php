<?php

namespace Afpa\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Afpa\CatalogBundle\Entity\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="text")
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;    

    /**
     * @var boolean
     *
     * @ORM\Column(name="stock", type="boolean")
     */
    private $stock;   

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;   

    /**
     * @var Brand
     *
     * @ORM\ManyToOne(targetEntity="Afpa\CatalogBundle\Entity\Brand", cascade={"persist"})
     */
    private $brand;

    /**
     * @var Categories
     *
     * @ORM\ManyToMany(targetEntity="Afpa\CatalogBundle\Entity\Category", cascade={"persist"})
     */
    private $categories;



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
     * @return Product
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
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Product
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
     * Set stock
     *
     * @param boolean $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return boolean 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Product
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set brand
     *
     * @param \Afpa\CatalogBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\Afpa\CatalogBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Afpa\CatalogBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set categories
     *
     * @param \Afpa\CatalogBundle\Entity\Category $categories
     * @return Product
     */
    public function setCategories(\Afpa\CatalogBundle\Entity\Category $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \Afpa\CatalogBundle\Entity\Category 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param \Afpa\CatalogBundle\Entity\Category $categories
     * @return Product
     */
    public function addCategory(\Afpa\CatalogBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Afpa\CatalogBundle\Entity\Category $categories
     */
    public function removeCategory(\Afpa\CatalogBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }
}
