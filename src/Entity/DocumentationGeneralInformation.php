<?php

namespace App\Entity;

use App\Repository\DocumentationGeneralInformationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentationGeneralInformationRepository::class)]
class DocumentationGeneralInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(inversedBy: 'documentationGeneralInformation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?GeneralInformation $generalInformation = null;

    #[ORM\Column(length: 255)]
    private ?string $route = null;

    #[ORM\Column(length: 255)]
    private ?string $fasFaIcon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getGeneralInformation(): ?GeneralInformation
    {
        return $this->generalInformation;
    }

    public function setGeneralInformation(?GeneralInformation $generalInformation): static
    {
        $this->generalInformation = $generalInformation;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): static
    {
        $this->route = $route;

        return $this;
    }

    public function getFasFaIcon(): ?string
    {
        return $this->fasFaIcon;
    }

    public function setFasFaIcon(string $fasFaIcon): static
    {
        $this->fasFaIcon = $fasFaIcon;

        return $this;
    }
}
