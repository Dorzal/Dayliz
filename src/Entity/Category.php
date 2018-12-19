<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products;

    /**
     * Many Interest have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="interests")
     */
    private $users;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getUsers(){
        return $this->users;
    }

    public function addUsers(User $user) {
        $this->users[] = $user;
    }

    public function removeUsers(User $user) {
        $this->users->removeElement($user);
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
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProducts(Product $product): self {

        if($this->products->contains($product)) {
            $this->products->removeElement($product);
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

}
