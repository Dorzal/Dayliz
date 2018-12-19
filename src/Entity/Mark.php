<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarkRepository")
 */
class Mark
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="mark")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return Collection | Product[]
     */
    public function getProducts(){
        return $this->products;
    }

    public function addProducts(Product $product): self{
        if(!$this->products->contains($product)){
            $this->products[] = $product;
            $product->setMark($this);
        }

        return $this;
    }

    public function removeProducts(Product $product): self {

        if($this->products->contains($product)) {
            $this->products->removeElement($product);
            if ($product->getMark() === $this) {
                $product->setMark(null);
            }

            return $this;
        }

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
}
