<?php

namespace App\Entity;

use App\Repository\MovimientoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovimientoRepository::class)
 */
class Movimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulo",inversedBy="movimiento")
     */
    private $articulo;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoMovimiento",inversedBy="movimiento")
     */
    private $tipoMovimiento;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCrea;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticulo(): ?Articulo
    {
        return $this->articulo;
    }

    public function setArticulo(Articulo $articulo): self
    {
        $this->articulo = $articulo;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getTipoMovimiento(): ?TipoMovimiento
    {
        return $this->tipoMovimiento;
    }

    public function setTipoMovimiento(TipoMovimiento $tipoMovimiento): self
    {
        $this->tipoMovimiento = $tipoMovimiento;

        return $this;
    }

    public function getFechaCrea(): ?\DateTimeInterface
    {
        return $this->fechaCrea;
    }

    public function setFechaCrea(\DateTimeInterface $fechaCrea): self
    {
        $this->fechaCrea = $fechaCrea;

        return $this;
    }
    public function ToJson()
    {
        return [
            'id' => $this->getId(),
            'articulo' => $this->getArticulo()->getDescripcion(),
            'cantidad' => $this->getCantidad(),
            'tipoMovimiento' => $this->getTipoMovimiento()->getDescripcion(),
            'fechaCrea' => $this->getFechaCrea()->format('Y-m-d H:i:s')
        ];
    }
}
