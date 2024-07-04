<?php

namespace App\Entity;

use App\Repository\ShirtsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShirtsRepository::class)]
class Shirts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    #[ORM\ManyToOne(inversedBy: 'shirts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'shirts')]
    private Collection $shirt;

    public function __construct()
    {
        $this->shirt = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getShirt(): Collection
    {
        return $this->shirt;
    }

    public function addShirt(Order $shirt): static
    {
        if (!$this->shirt->contains($shirt)) {
            $this->shirt->add($shirt);
            $shirt->setShirts($this);
        }

        return $this;
    }

    public function removeShirt(Order $shirt): static
    {
        if ($this->shirt->removeElement($shirt)) {
            // set the owning side to null (unless already changed)
            if ($shirt->getShirts() === $this) {
                $shirt->setShirts(null);
            }
        }

        return $this;
    }

}
