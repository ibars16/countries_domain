<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    public CONST HUA_HIN_ID = 1;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'regions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    /**
     * @var Collection<int, InfoGettingThere>
     */
    #[ORM\OneToMany(targetEntity: InfoGettingThere::class, mappedBy: 'region')]
    private Collection $infoGettingTheres;

    /**
     * @var Collection<int, TouristGuide>
     */
    #[ORM\OneToMany(targetEntity: TouristGuide::class, mappedBy: 'region')]
    private Collection $touristGuides;

    /**
     * @var Collection<int, GeneralInformation>
     */
    #[ORM\OneToMany(targetEntity: GeneralInformation::class, mappedBy: 'region')]
    private Collection $generalInformation;

    /**
     * @var Collection<int, InsuranceInformation>
     */
    #[ORM\OneToMany(targetEntity: InsuranceInformation::class, mappedBy: 'region')]
    private Collection $insuranceInformation;

    public function __construct()
    {
        $this->infoGettingTheres = new ArrayCollection();
        $this->touristGuides = new ArrayCollection();
        $this->generalInformation = new ArrayCollection();
        $this->insuranceInformation = new ArrayCollection();
    }

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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, InfoGettingThere>
     */
    public function getInfoGettingTheres(): Collection
    {
        return $this->infoGettingTheres;
    }

    public function addInfoGettingThere(InfoGettingThere $infoGettingThere): static
    {
        if (!$this->infoGettingTheres->contains($infoGettingThere)) {
            $this->infoGettingTheres->add($infoGettingThere);
            $infoGettingThere->setRegion($this);
        }

        return $this;
    }

    public function removeInfoGettingThere(InfoGettingThere $infoGettingThere): static
    {
        if ($this->infoGettingTheres->removeElement($infoGettingThere)) {
            // set the owning side to null (unless already changed)
            if ($infoGettingThere->getRegion() === $this) {
                $infoGettingThere->setRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TouristGuide>
     */
    public function getTouristGuides(): Collection
    {
        return $this->touristGuides;
    }

    public function addTouristGuide(TouristGuide $touristGuide): static
    {
        if (!$this->touristGuides->contains($touristGuide)) {
            $this->touristGuides->add($touristGuide);
            $touristGuide->setRegion($this);
        }

        return $this;
    }

    public function removeTouristGuide(TouristGuide $touristGuide): static
    {
        if ($this->touristGuides->removeElement($touristGuide)) {
            // set the owning side to null (unless already changed)
            if ($touristGuide->getRegion() === $this) {
                $touristGuide->setRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GeneralInformation>
     */
    public function getGeneralInformation(): Collection
    {
        return $this->generalInformation;
    }

    public function addGeneralInformation(GeneralInformation $generalInformation): static
    {
        if (!$this->generalInformation->contains($generalInformation)) {
            $this->generalInformation->add($generalInformation);
            $generalInformation->setRegion($this);
        }

        return $this;
    }

    public function removeGeneralInformation(GeneralInformation $generalInformation): static
    {
        if ($this->generalInformation->removeElement($generalInformation)) {
            // set the owning side to null (unless already changed)
            if ($generalInformation->getRegion() === $this) {
                $generalInformation->setRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InsuranceInformation>
     */
    public function getInsuranceInformation(): Collection
    {
        return $this->insuranceInformation;
    }

    public function addInsuranceInformation(InsuranceInformation $insuranceInformation): static
    {
        if (!$this->insuranceInformation->contains($insuranceInformation)) {
            $this->insuranceInformation->add($insuranceInformation);
            $insuranceInformation->setRegion($this);
        }

        return $this;
    }

    public function removeInsuranceInformation(InsuranceInformation $insuranceInformation): static
    {
        if ($this->insuranceInformation->removeElement($insuranceInformation)) {
            // set the owning side to null (unless already changed)
            if ($insuranceInformation->getRegion() === $this) {
                $insuranceInformation->setRegion(null);
            }
        }

        return $this;
    }
}
