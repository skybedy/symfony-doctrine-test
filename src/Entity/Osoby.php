<?php

namespace App\Entity;

use App\Repository\OsobyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OsobyRepository::class)
 */
class Osoby
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jmeno;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prijmeni;

    /**
     * @ORM\ManyToOne(targetEntity=Tymy::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tym;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): self
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getPrijmeni(): ?string
    {
        return $this->prijmeni;
    }

    public function setPrijmeni(string $prijmeni): self
    {
        $this->prijmeni = $prijmeni;

        return $this;
    }

    public function getTym(): ?tymy
    {
        return $this->tym;
    }

    public function setTym(?tymy $tym): self
    {
        $this->tym = $tym;

        return $this;
    }
}
