<?php

namespace App\Entity;

use App\Repository\DishCategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DishCategoryRepository::class)
 */
class DishCategory
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
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="Category")
     */
    private $Dishes;

    /**
     * @ORM\ManyToOne(targetEntity=DishSubCategory::class, inversedBy="dishCategories")
     */
    private $SubCategory;

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

    /**
     * @return Collection<int, Menu>
     */
    public function getDishes(): Collection
    {
        return $this->Dishes;
    }

    public function addDish(Menu $dish): self
    {
        if (!$this->Dishes->contains($dish)) {
            $this->Dishes[] = $dish;
            $dish->setCategory($this);
        }

        return $this;
    }

    public function removeDish(Menu $dish): self
    {
        if ($this->Dishes->removeElement($dish)) {
            // set the owning side to null (unless already changed)
            if ($dish->getCategory() === $this) {
                $dish->setCategory(null);
            }
        }

        return $this;
    }

    public function getSubCategory(): ?DishSubCategory
    {
        return $this->SubCategory;
    }

    public function setSubCategory(?DishSubCategory $SubCategory): self
    {
        $this->SubCategory = $SubCategory;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
