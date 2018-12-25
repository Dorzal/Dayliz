<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterestRepository")
 */
class Interest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $category_id;

    /**
     * One interet has many category. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Category", mappedBy="product")
     */
    private $categorys;

    public function __construct() {
        $this->categorys = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }
}
