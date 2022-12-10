<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Rut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrasenia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRut(): ?string
    {
        return $this->Rut;
    }

    public function setRut(string $Rut): self
    {
        $this->Rut = $Rut;

        return $this;
    }

    public function getContrasenia(): ?string
    {
        return $this->Contrasenia;
    }

    public function setContrasenia(string $Contrasenia): self
    {
        $this->Contrasenia = $Contrasenia;

        return $this;
    }
}
