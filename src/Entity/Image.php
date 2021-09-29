<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $rl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRl(): ?string
    {
        return $this->rl;
    }

    public function setRl(string $rl): self
    {
        $this->rl = $rl;

        return $this;
    }
}
