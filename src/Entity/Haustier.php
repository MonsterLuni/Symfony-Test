<?php

namespace App\Entity;

use App\Repository\HaustierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HaustierRepository::class)]
class Haustier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?float $Gewicht = null;

    #[ORM\Column]
    private ?float $Groesse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Geburtsdatum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getGewicht(): ?float
    {
        return $this->Gewicht;
    }

    public function setGewicht(float $Gewicht): self
    {
        $this->Gewicht = $Gewicht;

        return $this;
    }

    public function getGroesse(): ?float
    {
        return $this->Groesse;
    }

    public function setGroesse(float $Groesse): self
    {
        $this->Groesse = $Groesse;

        return $this;
    }

    public function getGeburtsdatum(): ?\DateTimeInterface
    {
        return $this->Geburtsdatum;
    }

    public function setGeburtsdatum(\DateTimeInterface $Geburtsdatum): self
    {
        $this->Geburtsdatum = $Geburtsdatum;

        return $this;
    }
}
