<?php

namespace App\Entity;

use App\Repository\ArticuloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticuloRepository::class)
 */
class Articulo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stock", inversedBy="articulo")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ubication;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movimiento", mappedBy="articulo")
     */
    private $movimientos;

    public function __construct()
    {
        $this->movimientos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
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

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setInventory(Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getUbication(): ?string
    {
        return $this->ubication;
    }

    public function setUbication(string $ubication): self
    {
        $this->ubication = $ubication;

        return $this;
    }

    public function getMovimientos()
    {
        return $this->movimientos;
    }

    public function setMovimientos($movimientos): void
    {
        $this->movimientos = $movimientos;
    }


}
