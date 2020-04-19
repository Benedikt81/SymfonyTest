<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeographicalEntityRepository")
 */
class GeographicalEntity extends NamedEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Longitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Latitude;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GeographicalEntity", inversedBy="geographicalEntities")
     */
    private $ParentGeographicalEntity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GeographicalEntity", mappedBy="ParentGeographicalEntity")
     */
    private $childGeographicalEntities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Value", mappedBy="GeographicalEntity")
     */
    private $statisticalValues;

    public function __construct()
    {
        $this->childGeographicalEntities = new ArrayCollection();
        $this->statisticalValues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongitude(): ?float
    {
        return $this->Longitude;
    }

    public function setLongitude(?float $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->Latitude;
    }

    public function setLatitude(?float $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getParentGeographicalEntity(): ?self
    {
        return $this->ParentGeographicalEntity;
    }

    public function setParentGeographicalEntity(?self $ParentGeographicalEntity): self
    {
        $this->ParentGeographicalEntity = $ParentGeographicalEntity;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildGeographicalEntities(): Collection
    {
        return $this->childGeographicalEntities;
    }

    public function addGeographicalEntity(self $geographicalEntity): self
    {
        if (!$this->childGeographicalEntities->contains($geographicalEntity)) {
            $this->childGeographicalEntities[] = $geographicalEntity;
            $geographicalEntity->setParentGeographicalEntity($this);
        }

        return $this;
    }

    public function removeGeographicalEntity(self $geographicalEntity): self
    {
        if ($this->childGeographicalEntities->contains($geographicalEntity)) {
            $this->childGeographicalEntities->removeElement($geographicalEntity);
            // set the owning side to null (unless already changed)
            if ($geographicalEntity->getParentGeographicalEntity() === $this) {
                $geographicalEntity->setParentGeographicalEntity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Value[]
     */
    public function getStatisticalValues(): Collection
    {
        return $this->statisticalValues;
    }

    public function addStatisticalValue(Value $statisticalValue): self
    {
        if (!$this->statisticalValues->contains($statisticalValue)) {
            $this->statisticalValues[] = $statisticalValue;
            $statisticalValue->setGeographicalEntity($this);
        }

        return $this;
    }

    public function removeStatisticalValue(Value $statisticalValue): self
    {
        if ($this->statisticalValues->contains($statisticalValue)) {
            $this->statisticalValues->removeElement($statisticalValue);
            // set the owning side to null (unless already changed)
            if ($statisticalValue->getGeographicalEntity() === $this) {
                $statisticalValue->setGeographicalEntity(null);
            }
        }

        return $this;
    }
}
