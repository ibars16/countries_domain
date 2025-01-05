<?php

namespace App\Entity;

use App\Repository\RiverTouristGuideRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiverTouristGuideRepository::class)]
class RiverTouristGuide
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'riverTouristGuides')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TouristGuide $toursitGuide = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getToursitGuide(): ?TouristGuide
    {
        return $this->toursitGuide;
    }

    public function setToursitGuide(?TouristGuide $toursitGuide): static
    {
        $this->toursitGuide = $toursitGuide;

        return $this;
    }
}
