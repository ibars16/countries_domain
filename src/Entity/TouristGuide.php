<?php

namespace App\Entity;

use App\Repository\TouristGuideRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TouristGuideRepository::class)]
class TouristGuide
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToOne(inversedBy: 'touristGuides')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $region = null;

    /**
     * @var Collection<int, BeachTouristGuide>
     */
    #[ORM\OneToMany(targetEntity: BeachTouristGuide::class, mappedBy: 'touristGuide')]
    private Collection $beachTouristGuides;

    /**
     * @var Collection<int, NightClubToursitGuide>
     */
    #[ORM\OneToMany(targetEntity: NightClubToursitGuide::class, mappedBy: 'touristGuide')]
    private Collection $nightClubToursitGuides;

    /**
     * @var Collection<int, Restaurant>
     */
    #[ORM\OneToMany(targetEntity: Restaurant::class, mappedBy: 'touristGuide')]
    private Collection $restaurants;

    /**
     * @var Collection<int, RiverTouristGuide>
     */
    #[ORM\OneToMany(targetEntity: RiverTouristGuide::class, mappedBy: 'toursitGuide')]
    private Collection $riverTouristGuides;

    /**
     * @var Collection<int, CaveTouristGuide>
     */
    #[ORM\OneToMany(targetEntity: CaveTouristGuide::class, mappedBy: 'touristGuide')]
    private Collection $caveTouristGuides;

    /**
     * @var Collection<int, NaturalParkTouristGuide>
     */
    #[ORM\OneToMany(targetEntity: NaturalParkTouristGuide::class, mappedBy: 'touristGuide')]
    private Collection $naturalParkTouristGuides;

    public function __construct()
    {
        $this->beachTouristGuides = new ArrayCollection();
        $this->nightClubToursitGuides = new ArrayCollection();
        $this->restaurants = new ArrayCollection();
        $this->riverTouristGuides = new ArrayCollection();
        $this->caveTouristGuides = new ArrayCollection();
        $this->naturalParkTouristGuides = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, BeachTouristGuide>
     */
    public function getBeachTouristGuides(): Collection
    {
        return $this->beachTouristGuides;
    }

    public function addBeachTouristGuide(BeachTouristGuide $beachTouristGuide): static
    {
        if (!$this->beachTouristGuides->contains($beachTouristGuide)) {
            $this->beachTouristGuides->add($beachTouristGuide);
            $beachTouristGuide->setTouristGuide($this);
        }

        return $this;
    }

    public function removeBeachTouristGuide(BeachTouristGuide $beachTouristGuide): static
    {
        if ($this->beachTouristGuides->removeElement($beachTouristGuide)) {
            // set the owning side to null (unless already changed)
            if ($beachTouristGuide->getTouristGuide() === $this) {
                $beachTouristGuide->setTouristGuide(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NightClubToursitGuide>
     */
    public function getNightClubToursitGuides(): Collection
    {
        return $this->nightClubToursitGuides;
    }

    public function addNightClubToursitGuide(NightClubToursitGuide $nightClubToursitGuide): static
    {
        if (!$this->nightClubToursitGuides->contains($nightClubToursitGuide)) {
            $this->nightClubToursitGuides->add($nightClubToursitGuide);
            $nightClubToursitGuide->setTouristGuide($this);
        }

        return $this;
    }

    public function removeNightClubToursitGuide(NightClubToursitGuide $nightClubToursitGuide): static
    {
        if ($this->nightClubToursitGuides->removeElement($nightClubToursitGuide)) {
            // set the owning side to null (unless already changed)
            if ($nightClubToursitGuide->getTouristGuide() === $this) {
                $nightClubToursitGuide->setTouristGuide(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): static
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants->add($restaurant);
            $restaurant->setTouristGuide($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): static
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getTouristGuide() === $this) {
                $restaurant->setTouristGuide(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RiverTouristGuide>
     */
    public function getRiverTouristGuides(): Collection
    {
        return $this->riverTouristGuides;
    }

    public function addRiverTouristGuide(RiverTouristGuide $riverTouristGuide): static
    {
        if (!$this->riverTouristGuides->contains($riverTouristGuide)) {
            $this->riverTouristGuides->add($riverTouristGuide);
            $riverTouristGuide->setToursitGuide($this);
        }

        return $this;
    }

    public function removeRiverTouristGuide(RiverTouristGuide $riverTouristGuide): static
    {
        if ($this->riverTouristGuides->removeElement($riverTouristGuide)) {
            // set the owning side to null (unless already changed)
            if ($riverTouristGuide->getToursitGuide() === $this) {
                $riverTouristGuide->setToursitGuide(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CaveTouristGuide>
     */
    public function getCaveTouristGuides(): Collection
    {
        return $this->caveTouristGuides;
    }

    public function addCaveTouristGuide(CaveTouristGuide $caveTouristGuide): static
    {
        if (!$this->caveTouristGuides->contains($caveTouristGuide)) {
            $this->caveTouristGuides->add($caveTouristGuide);
            $caveTouristGuide->setTouristGuide($this);
        }

        return $this;
    }

    public function removeCaveTouristGuide(CaveTouristGuide $caveTouristGuide): static
    {
        if ($this->caveTouristGuides->removeElement($caveTouristGuide)) {
            // set the owning side to null (unless already changed)
            if ($caveTouristGuide->getTouristGuide() === $this) {
                $caveTouristGuide->setTouristGuide(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NaturalParkTouristGuide>
     */
    public function getNaturalParkTouristGuides(): Collection
    {
        return $this->naturalParkTouristGuides;
    }

    public function addNaturalParkTouristGuide(NaturalParkTouristGuide $naturalParkTouristGuide): static
    {
        if (!$this->naturalParkTouristGuides->contains($naturalParkTouristGuide)) {
            $this->naturalParkTouristGuides->add($naturalParkTouristGuide);
            $naturalParkTouristGuide->setTouristGuide($this);
        }

        return $this;
    }

    public function removeNaturalParkTouristGuide(NaturalParkTouristGuide $naturalParkTouristGuide): static
    {
        if ($this->naturalParkTouristGuides->removeElement($naturalParkTouristGuide)) {
            // set the owning side to null (unless already changed)
            if ($naturalParkTouristGuide->getTouristGuide() === $this) {
                $naturalParkTouristGuide->setTouristGuide(null);
            }
        }

        return $this;
    }
}
