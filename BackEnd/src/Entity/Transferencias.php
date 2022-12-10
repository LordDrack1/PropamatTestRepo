<?php

namespace App\Entity;

use App\Repository\TransferenciasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransferenciasRepository::class)
 */
class Transferencias
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
    private $destinatario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remitente;

    /**
     * @ORM\Column(type="integer")
     */
    private $monto;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Rut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Banco;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TipoCuenta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestinatario(): ?string
    {
        return $this->destinatario;
    }

    public function setDestinatario(string $destinatario): self
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    public function getRemitente(): ?string
    {
        return $this->remitente;
    }

    public function setRemitente(string $remitente): self
    {
        $this->remitente = $remitente;

        return $this;
    }

    public function getMonto(): ?int
    {
        return $this->monto;
    }

    public function setMonto(int $monto): self
    {
        $this->monto = $monto;

        return $this;
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

    public function getBanco(): ?string
    {
        return $this->Banco;
    }

    public function setBanco(string $Banco): self
    {
        $this->Banco = $Banco;

        return $this;
    }

    public function getTipoCuenta(): ?string
    {
        return $this->TipoCuenta;
    }

    public function setTipoCuenta(string $TipoCuenta): self
    {
        $this->TipoCuenta = $TipoCuenta;

        return $this;
    }
}
