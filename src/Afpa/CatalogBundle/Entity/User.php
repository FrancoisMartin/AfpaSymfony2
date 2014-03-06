<?php

namespace Afpa\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Afpa\CatalogBundle\Entity\UserRepository")
 */
class User  extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Afpa\CatalogBundle\Entity\Category", cascade={"persist"})
     */
    private $category;
    

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
     * Set category
     *
     * @param \Afpa\CatalogBundle\Entity\Category $category
     * @return User
     */
    public function setCategory(\Afpa\CatalogBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Afpa\CatalogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
