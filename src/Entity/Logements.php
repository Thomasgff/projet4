<?php

namespace App\Entity;

use App\Repository\LogementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogementsRepository::class)]
class Logements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $reference = null;

    #[ORM\Column(length: 255)]
    private ?string $typologie = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 20, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 20, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $dispos = [];

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $prix = [];

    #[ORM\Column(nullable: true)]
    private ?int $superficie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $chambres = null;

    #[ORM\Column(nullable: true)]
    private ?int $salledebain = null;

    #[ORM\Column(nullable: true)]
    private ?bool $wifi = null;

    public function __toString(): string
    {
        return $this->typologie.' '.$this->nom;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTypologie(): ?string
    {
        return $this->typologie;
    }

    public function setTypologie(string $typologie): self
    {
        $this->typologie = $typologie;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDispos(): array
    {
        return $this->dispos;
    }

    public function setDispos(?array $dispos): self
    {
        $this->dispos = $dispos;

        return $this;
    }

    public function getPrix(): array
    {
        return $this->prix;
    }

    public function setPrix(?array $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(?int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(?int $chambres): self
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getSalledebain(): ?int
    {
        return $this->salledebain;
    }

    public function setSalledebain(?int $salledebain): self
    {
        $this->salledebain = $salledebain;

        return $this;
    }

    public function isWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(?bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }
}
