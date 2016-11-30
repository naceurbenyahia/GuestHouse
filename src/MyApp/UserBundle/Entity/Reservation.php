<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="id_a", columns={"id_a"}), @ORM\Index(name="id_p", columns={"id_p"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date", nullable=false)
     */
    private $datearrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date", nullable=false)
     */
    private $datedepart;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPersonne", type="integer", nullable=false)
     */
    private $nbrpersonne;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_a", type="integer", nullable=true)
     */
    private $idA;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_p", type="integer", nullable=true)
     */
    private $idP;

    /**
     * @return int
     */
    public function getIdRv()
    {
        return $this->idRv;
    }

    /**
     * @param int $idRv
     */
    public function setIdRv($idRv)
    {
        $this->idRv = $idRv;
    }

    /**
     * @return \DateTime
     */
    public function getDatearrivee()
    {
        return $this->datearrivee;
    }

    /**
     * @param \DateTime $datearrivee
     */
    public function setDatearrivee($datearrivee)
    {
        $this->datearrivee = $datearrivee;
    }

    /**
     * @return \DateTime
     */
    public function getDatedepart()
    {
        return $this->datedepart;
    }

    /**
     * @param \DateTime $datedepart
     */
    public function setDatedepart($datedepart)
    {
        $this->datedepart = $datedepart;
    }

    /**
     * @return int
     */
    public function getNbrpersonne()
    {
        return $this->nbrpersonne;
    }

    /**
     * @param int $nbrpersonne
     */
    public function setNbrpersonne($nbrpersonne)
    {
        $this->nbrpersonne = $nbrpersonne;
    }

    /**
     * @return int
     */
    public function getIdA()
    {
        return $this->idA;
    }

    /**
     * @param int $idA
     */
    public function setIdA($idA)
    {
        $this->idA = $idA;
    }

    /**
     * @return int
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param int $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }


}

