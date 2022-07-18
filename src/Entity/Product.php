<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=carte::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carte;

    /**
     * @ORM\OneToMany(targetEntity=ByProduct::class, mappedBy="product", orphanRemoval=true)
     */
    private $byProducts;

    /**
     * @ORM\ManyToOne(targetEntity=category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function __construct()
    {
        $this->byProducts = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCarte(): ?carte
    {
        return $this->carte;
    }

    public function setCarte(?carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * @return Collection<int, ByProduct>
     */
    public function getByProducts(): Collection
    {
        return $this->byProducts;
    }

    public function addByProduct(ByProduct $byProduct): self
    {
        if (!$this->byProducts->contains($byProduct)) {
            $this->byProducts[] = $byProduct;
            $byProduct->setProduct($this);
        }

        return $this;
    }

    public function removeByProduct(ByProduct $byProduct): self
    {
        if ($this->byProducts->removeElement($byProduct)) {
            // set the owning side to null (unless already changed)
            if ($byProduct->getProduct() === $this) {
                $byProduct->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
