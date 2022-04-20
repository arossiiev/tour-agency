<?php

namespace App\Entity;

use App\Repository\RouteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RouteRepository::class)
 */
class Route
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_time;


    /**
     * @ORM\OneToMany(targetEntity=SightInRoute::class, mappedBy="route")
     * @ORM\OrderBy({"sight_order" = "ASC"})
     */
    private $sightInRoutes;

    /**
     * @ORM\OneToOne(targetEntity=Tour::class, inversedBy="route", cascade={"persist", "remove"})
     */
    private $tour;



    public function __construct()
    {
        $this->sightInRoutes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }



    /**
     * @return Collection<int, SightInRoute>
     */
    public function getSightInRoutes(): Collection
    {
        return $this->sightInRoutes;
    }

    public function addSightInRoute(SightInRoute $sightInRoute): self
    {
        if (!$this->sightInRoutes->contains($sightInRoute)) {
            $this->sightInRoutes[] = $sightInRoute;
            $sightInRoute->setRoute($this);
        }

        return $this;
    }

    public function removeSightInRoute(SightInRoute $sightInRoute): self
    {
        if ($this->sightInRoutes->removeElement($sightInRoute)) {
            // set the owning side to null (unless already changed)
            if ($sightInRoute->getRoute() === $this) {
                $sightInRoute->setRoute(null);
            }
        }

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): self
    {
        $this->tour = $tour;

        return $this;
    }


}
