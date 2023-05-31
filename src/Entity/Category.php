<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Anotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[Gedmo\Timestampable(on :'create')]
    private ?\DateTimeImmutable $created_at = null;

    
    #[Gedmo\Timestampable(on :'update')]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Actuallite::class)]
    private Collection $actuallites;

    public function __construct()
    {
        $this->actuallites = new ArrayCollection();
    }

    public function __toString(){
        return $this->getName();
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

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }


    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    /**
     * @return Collection<int, Actuallite>
     */
    public function getActuallites(): Collection
    {
        return $this->actuallites;
    }

    public function addActuallite(Actuallite $actuallite): self
    {
        if (!$this->actuallites->contains($actuallite)) {
            $this->actuallites->add($actuallite);
            $actuallite->setCategory($this);
        }

        return $this;
    }

    public function removeActuallite(Actuallite $actuallite): self
    {
        if ($this->actuallites->removeElement($actuallite)) {
            // set the owning side to null (unless already changed)
            if ($actuallite->getCategory() === $this) {
                $actuallite->setCategory(null);
            }
        }

        return $this;
    }

}
