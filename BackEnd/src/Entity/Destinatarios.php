<?php

namespace App\Entity;

use App\Repository\DestinatariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinatariosRepository::class)
 */
class Destinatarios
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $rut;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banco_destino;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo_cuenta;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_cuenta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getRut(): ?string
    {
        return $this->rut;
    }

    public function setRut(string $rut): self
    {
        $this->rut = $rut;

        return $this;
    }

    public function getNumeroTelefono(): ?int
    {
        return $this->numero_telefono;
    }

    public function setNumeroTelefono(int $numero_telefono): self
    {
        $this->numero_telefono = $numero_telefono;

        return $this;
    }

    public function getBancoDestino(): ?string
    {
        return $this->banco_destino;
    }

    public function setBancoDestino(string $banco_destino): self
    {
        $this->banco_destino = $banco_destino;

        return $this;
    }

    public function getTipoCuenta(): ?string
    {
        return $this->tipo_cuenta;
    }

    public function setTipoCuenta(string $tipo_cuenta): self
    {
        $this->tipo_cuenta = $tipo_cuenta;

        return $this;
    }

    public function getNumeroCuenta(): ?int
    {
        return $this->numero_cuenta;
    }

    public function setNumeroCuenta(int $numero_cuenta): self
    {
        $this->numero_cuenta = $numero_cuenta;

        return $this;
    }
}
