<?php

namespace App\Entity;

use App\Repository\BancosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BancosRepository::class)
 */
class Bancos
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
    private $nombre_banco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreBanco(): ?string
    {
        return $this->nombre_banco;
    }

    public function setNombreBanco(string $nombre_banco): self
    {
        $this->nombre_banco = $nombre_banco;

        return $this;
    }
}
