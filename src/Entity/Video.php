<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
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
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $anne_diff;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $paye_org;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dispo_multi_lang;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $format_img;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dispo_en_replay;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAnneDiff(): ?\DateTimeInterface
    {
        return $this->anne_diff;
    }

    public function setAnneDiff(\DateTimeInterface $anne_diff): self
    {
        $this->anne_diff = $anne_diff;

        return $this;
    }

    public function getPayeOrg(): ?string
    {
        return $this->paye_org;
    }

    public function setPayeOrg(string $paye_org): self
    {
        $this->paye_org = $paye_org;

        return $this;
    }

    public function getDispoMultiLang(): ?bool
    {
        return $this->dispo_multi_lang;
    }

    public function setDispoMultiLang(bool $dispo_multi_lang): self
    {
        $this->dispo_multi_lang = $dispo_multi_lang;

        return $this;
    }

    public function getFormatImg(): ?string
    {
        return $this->format_img;
    }

    public function setFormatImg(string $format_img): self
    {
        $this->format_img = $format_img;

        return $this;
    }

    public function getDispoEnReplay(): ?bool
    {
        return $this->dispo_en_replay;
    }

    public function setDispoEnReplay(bool $dispo_en_replay): self
    {
        $this->dispo_en_replay = $dispo_en_replay;

        return $this;
    }
}
