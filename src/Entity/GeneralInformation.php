<?php

namespace App\Entity;

use App\Repository\GeneralInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneralInformationRepository::class)]
class GeneralInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $region = null;

    #[ORM\OneToOne(mappedBy: 'generalInformation', cascade: ['persist', 'remove'])]
    private ?DocumentationGeneralInformation $documentationGeneralInformation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getDocumentationGeneralInformation(): ?DocumentationGeneralInformation
    {
        return $this->documentationGeneralInformation;
    }

    public function setDocumentationGeneralInformation(?DocumentationGeneralInformation $documentationGeneralInformation): static
    {
        // Si ya había una relación, desvincular
        if ($this->documentationGeneralInformation && $this->documentationGeneralInformation->getGeneralInformation() !== $this) {
            $this->documentationGeneralInformation->setGeneralInformation(null);
        }

        $this->documentationGeneralInformation = $documentationGeneralInformation;

        // Configurar el lado inverso de la relación
        if ($documentationGeneralInformation && $documentationGeneralInformation->getGeneralInformation() !== $this) {
            $documentationGeneralInformation->setGeneralInformation($this);
        }

        return $this;
    }
}
