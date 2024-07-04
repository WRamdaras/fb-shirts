<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(targetEntity: Shirts::class, mappedBy: 'category')]
    private Collection $shirts;

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'category')]
    private Collection $category;

    public function __construct()
    {
        $this->shirts = new ArrayCollection();
        $this->category = new ArrayCollection();
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

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

    /**
     * @return Collection<int, shirts>
     */
    public function getShirts(): Collection
    {
        return $this->shirts;
    }

    public function addShirt(shirts $shirt): static
    {
        if (!$this->shirts->contains($shirt)) {
            $this->shirts->add($shirt);
            $shirt->setCategory($this);
        }

        return $this;
    }

    public function removeShirt(shirts $shirt): static
    {
        if ($this->shirts->removeElement($shirt)) {
            // set the owning side to null (unless already changed)
            if ($shirt->getCategory() === $this) {
                $shirt->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Order $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setCategory($this);
        }

        return $this;
    }

    public function removeCategory(Order $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategory() === $this) {
                $category->setCategory(null);
            }
        }

        return $this;
    }
}
