<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chasuble;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ballon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $barre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mini_plot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maillot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $short;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sifflet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChasuble(): ?int
    {
        return $this->chasuble;
    }

    public function setChasuble(?int $chasuble): self
    {
        $this->chasuble = $chasuble;

        return $this;
    }

    public function getBallon(): ?int
    {
        return $this->ballon;
    }

    public function setBallon(?int $ballon): self
    {
        $this->ballon = $ballon;

        return $this;
    }

    public function getPlot(): ?int
    {
        return $this->plot;
    }

    public function setPlot(?int $plot): self
    {
        $this->plot = $plot;

        return $this;
    }

    public function getBarre(): ?int
    {
        return $this->barre;
    }

    public function setBarre(?int $barre): self
    {
        $this->barre = $barre;

        return $this;
    }

    public function getMiniPlot(): ?int
    {
        return $this->mini_plot;
    }

    public function setMiniPlot(?int $mini_plot): self
    {
        $this->mini_plot = $mini_plot;

        return $this;
    }

    public function getMaillot(): ?int
    {
        return $this->maillot;
    }

    public function setMaillot(?int $maillot): self
    {
        $this->maillot = $maillot;

        return $this;
    }

    public function getShort(): ?int
    {
        return $this->short;
    }

    public function setShort(?int $short): self
    {
        $this->short = $short;

        return $this;
    }

    public function getSifflet(): ?int
    {
        return $this->sifflet;
    }

    public function setSifflet(?int $sifflet): self
    {
        $this->sifflet = $sifflet;

        return $this;
    }
}
