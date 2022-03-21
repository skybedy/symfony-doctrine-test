<?php

namespace App\Entity;

use App\Repository\TymyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TymyRepository::class)
 */
class Tymy
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
    private $nazev_tymu;

    /**
     * @ORM\OneToMany(targetEntity=Osoby1::class, mappedBy="tym")
     */
    private $osoby1test;

    /**
     * @ORM\OneToMany(targetEntity=Osoby2::class, mappedBy="tym")
     */
    private $osoby2s;

    public function __construct()
    {
        $this->osoby1test = new ArrayCollection();
        $this->osoby2s = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazevTymu(): ?string
    {
        return $this->nazev_tymu;
    }

    public function setNazevTymu(string $nazev_tymu): self
    {
        $this->nazev_tymu = $nazev_tymu;

        return $this;
    }

    /**
     * @return Collection<int, Osoby1>
     */
    public function getOsoby1test(): Collection
    {
        return $this->osoby1test;
    }

    public function addOsoby1test(Osoby1 $osoby1test): self
    {
        if (!$this->osoby1test->contains($osoby1test)) {
            $this->osoby1test[] = $osoby1test;
            $osoby1test->setTym($this);
        }

        return $this;
    }

    public function removeOsoby1test(Osoby1 $osoby1test): self
    {
        if ($this->osoby1test->removeElement($osoby1test)) {
            // set the owning side to null (unless already changed)
            if ($osoby1test->getTym() === $this) {
                $osoby1test->setTym(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Osoby2>
     */
    public function getOsoby2s(): Collection
    {
        return $this->osoby2s;
    }

    public function addOsoby2(Osoby2 $osoby2): self
    {
        if (!$this->osoby2s->contains($osoby2)) {
            $this->osoby2s[] = $osoby2;
            $osoby2->setTym($this);
        }

        return $this;
    }

    public function removeOsoby2(Osoby2 $osoby2): self
    {
        if ($this->osoby2s->removeElement($osoby2)) {
            // set the owning side to null (unless already changed)
            if ($osoby2->getTym() === $this) {
                $osoby2->setTym(null);
            }
        }

        return $this;
    }
}
