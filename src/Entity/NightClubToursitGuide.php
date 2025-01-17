<?php

namespace App\Entity;

use App\Repository\NightClubToursitGuideRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NightClubToursitGuideRepository::class)]
class NightClubToursitGuide
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'nightClubToursitGuides')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TouristGuide $touristGuide = null;

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

    public function getTouristGuide(): ?TouristGuide
    {
        return $this->touristGuide;
    }

    public function setTouristGuide(?TouristGuide $touristGuide): static
    {
        $this->touristGuide = $touristGuide;

        return $this;
    }
}
