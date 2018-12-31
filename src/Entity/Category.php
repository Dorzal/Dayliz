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
    private $name;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products;

    /**
     * @var User
     * @ORM\ManyToMany(targetEntity="User", mappedBy="interests")
     */
    protected $user;


    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->user = new ArrayCollection();
    }



    public function getUsersFav() {
        return $this->user;
    }


    public function setUsersFav(User $usersFav) {
        $this->user = $usersFav;
    }

    public function addUser(User $user)
    {
        if ($this->user->contains($user)) {
            return;
        }
        $this->user->add($user);
        $user->addInterest($this);
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
