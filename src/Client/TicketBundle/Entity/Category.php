<?php

namespace Client\TicketBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Client\TicketBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, unique=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Client\TicketBundle\Entity\Ordering", mappedBy="category")
     */
    private $ordering;

    public function __construct()
    {
        $this->ordering = new ArrayCollection();
    }

    public function __toString()
    {
        return "Category: " . $this->getId() . ". " . $this->getName();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Set alias
     *
     * @param string $alias
     *
     * @return Category
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Category
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Category
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add ordering
     *
     * @param \Client\TicketBundle\Entity\Ordering $ordering
     *
     * @return Category
     */
    public function addOrdering(\Client\TicketBundle\Entity\Ordering $ordering)
    {
        $this->ordering[] = $ordering;

        return $this;
    }

    /**
     * Remove ordering
     *
     * @param \Client\TicketBundle\Entity\Ordering $ordering
     */
    public function removeOrdering(\Client\TicketBundle\Entity\Ordering $ordering)
    {
        $this->ordering->removeElement($ordering);
    }

    /**
     * Get ordering
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
}
