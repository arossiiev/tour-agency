<?php

namespace App\Entity;

use App\Repository\SightInRouteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SightInRouteRepository::class)
 */
class SightInRoute
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
    private $sight_order;

    /**
     * @ORM\ManyToOne(targetEntity=Route::class, inversedBy="sightInRoutes")
     */
    private $route;

    /**
     * @ORM\ManyToOne(targetEntity=Sight::class)
     */
    private $sight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSightOrder(): ?int
    {
        return $this->sight_order;
    }

    public function setSightOrder(int $sight_order): self
    {
        $this->sight_order = $sight_order;

        return $this;
    }

    public function getRoute(): ?Route
    {
        return $this->route;
    }

    public function setRoute(?Route $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getSight(): ?Sight
    {
        return $this->sight;
    }

    public function setSight(?Sight $sight): self
    {
        $this->sight = $sight;

        return $this;
    }
}
