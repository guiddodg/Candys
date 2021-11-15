<?php

namespace App\Entity;

use App\Repository\TipoMovimientoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoMovimientoRepository::class)
 */
class TipoMovimiento
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
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movimiento",mappedBy="tipoMovimiento")
     */
    private $movimiento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
    public function getMovimiento()
    {
        return $this->movimiento;
    }
}
