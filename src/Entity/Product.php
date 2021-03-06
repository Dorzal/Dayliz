<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $describe;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Mark", inversedBy="products")
     */
    private $mark;

    public function getMarkId(): ?Mark {

        return $this->mark;
    }

    public function setMarkId(?int $mark_id): self {
        $this->mark_id = $mark_id;

        return $this;

    }

    public function getMark(){
        return $this->mark;
    }

    public function setMark(?Mark $mark): self {
        $this->mark = $mark;
        return $this;
    }

    public function getCategoryId(): ?Category {

        return $this->category;
    }

    public function setCategoryId(?int $category_id): self {
        $this->category_id = $category_id;

        return $this;

    }

    public function getCategory(){
        return $this->category;
    }

    public function setCategory(?Category $category): self {
        $this->category = $category;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescribe(): ?string
    {
        return $this->describe;
    }

    public function setDescribe(string $describe): self
    {
        $this->describe = $describe;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}
