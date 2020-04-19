<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatisticalEntityRepository")
 */
class StatisticalEntity extends NamedEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $Tag = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Value", mappedBy="StatisticalEntity")
     */
    private $Values;

    public function __construct()
    {
        $this->Values = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?array
    {
        return $this->Tag;
    }

    public function setTag(?array $Tag): self
    {
        $this->Tag = $Tag;

        return $this;
    }

    /**
     * @return Collection|Value[]
     */
    public function getValues(): Collection
    {
        return $this->Values;
    }

    public function addGeographicalEntityID(Value $geographicalEntityID): self
    {
        if (!$this->Values->contains($geographicalEntityID)) {
            $this->Values[] = $geographicalEntityID;
            $geographicalEntityID->setStatisticalEntity($this);
        }

        return $this;
    }

    public function removeGeographicalEntityID(Value $geographicalEntityID): self
    {
        if ($this->Values->contains($geographicalEntityID)) {
            $this->Values->removeElement($geographicalEntityID);
            // set the owning side to null (unless already changed)
            if ($geographicalEntityID->getStatisticalEntity() === $this) {
                $geographicalEntityID->setStatisticalEntity(null);
            }
        }

        return $this;
    }
}
