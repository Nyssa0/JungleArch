<?php

namespace App\Entity;

use App\Repository\DishSubCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DishSubCategoryRepository::class)
 */
class DishSubCategory
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
     * @ORM\OneToMany(targetEntity=DishCategory::class, mappedBy="SubCategory")
     */
    private $dishCategories;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="SubCategory")
     */
    private $plats;

    public function __construct()
    {
        $this->dishCategories = new ArrayCollection();
        $this->plats = new ArrayCollection();
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

    /**
     * @return Collection<int, DishCategory>
     */
    public function getDishCategories(): Collection
    {
        return $this->dishCategories;
    }

    public function addDishCategory(DishCategory $dishCategory): self
    {
        if (!$this->dishCategories->contains($dishCategory)) {
            $this->dishCategories[] = $dishCategory;
            $dishCategory->setSubCategory($this);
        }

        return $this;
    }

    public function removeDishCategory(DishCategory $dishCategory): self
    {
        if ($this->dishCategories->removeElement($dishCategory)) {
            // set the owning side to null (unless already changed)
            if ($dishCategory->getSubCategory() === $this) {
                $dishCategory->setSubCategory(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Menu $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->setSubCategory($this);
        }

        return $this;
    }

    public function removePlat(Menu $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getSubCategory() === $this) {
                $plat->setSubCategory(null);
            }
        }

        return $this;
    }
}
