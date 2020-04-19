<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValueRepository")
 */
class Value extends Entity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatisticalEntity", inversedBy="GeographicalEntityID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $StatisticalEntity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GeographicalEntity", inversedBy="statisticalValues")
     */
    private $GeographicalEntity;

    /**
     * @ORM\Column(type="float")
     */
    private $Value;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Timestamp;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $SourceUrl;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $SourceDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatisticalEntity(): ?StatisticalEntity
    {
        return $this->StatisticalEntity;
    }

    public function setStatisticalEntity(?StatisticalEntity $StatisticalEntity): self
    {
        $this->StatisticalEntity = $StatisticalEntity;

        return $this;
    }

    public function getGeographicalEntity(): ?GeographicalEntity
    {
        return $this->GeographicalEntity;
    }

    public function setGeographicalEntity(?GeographicalEntity $GeographicalEntity): self
    {
        $this->GeographicalEntity = $GeographicalEntity;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->Value;
    }

    public function setValue(?float $Value): self
    {
        $this->Value = $Value;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->Timestamp;
    }

    public function setTimestamp(\DateTimeInterface $Timestamp): self
    {
        $this->Timestamp = $Timestamp;

        return $this;
    }

    public function getSourceUrl(): ?string
    {
        return $this->SourceUrl;
    }

    public function setSourceUrl(?string $SourceUrl): self
    {
        $this->SourceUrl = $SourceUrl;

        return $this;
    }

    public function getSourceDescription(): ?string
    {
        return $this->SourceDescription;
    }

    public function setSourceDescription(?string $SourceDescription): self
    {
        $this->SourceDescription = $SourceDescription;

        return $this;
    }
}
