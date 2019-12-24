<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedecinRepository")
 */
class Medecin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=10,minMessage="trop court saisissez entre 2 et 10 caracteres",
     * maxMessage="trop court saisissez entre 2 et 10 caracteres",)
     * @Assert\Type(type="string",message="seule les caracteres alpha-numeriques sont authorises")
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=10,minMessage="trop court saisissez entre 2 et 10 caracteres",
     * maxMessage="trop court saisissez entre 2 et 10 caracteres")
     * @Assert\Type(type="string",message="seule les caracteres alphabetiques sont authorises")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=10,minMessage="trop court saisissez entre 2 et 10 caracteres",
     * maxMessage="trop court saisissez entre 2 et 10 caracteres",)
     * @Assert\Type(type="string",message="seule les caracteres alphabetiques sont authorises")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $datenaiss;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Services", inversedBy="medecins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $services;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Specialite", inversedBy="medecins")
     */
    private $specialite;

    public function __construct()
    {
        $this->specialite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDatenaiss()
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(\datetime $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): self
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialite(): Collection
    {
        return $this->specialite;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->specialite->contains($specialite)) {
            $this->specialite[] = $specialite;
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->specialite->contains($specialite)) {
            $this->specialite->removeElement($specialite);
        }

        return $this;
    }

    public function __toString()
    {

        return $this->libelle;
    }
}
