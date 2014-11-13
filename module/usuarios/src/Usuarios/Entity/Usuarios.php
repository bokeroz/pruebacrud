<?php

namespace Usuarios\Entity;

use Usuarios\Entity\UserInterface as UserInterface;

class Usuarios implements UserInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $nombre;

    /**
     * @var string
     */
    protected $puesto;

    /**
     * @var string
     */
    protected $area;

    /**
     * @var string
     */
##################################################################################
    /**
     * Get id.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }
#####################################################################3
    /**
     * Get username.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set username.
     *
     * @param string $username
     * @return UserInterface
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }
##########################################################################
    /**
     * Get email.
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->Puesto;
    }

    /**
     * Set email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
        return $this;
    }
########################################################################################
    /**
     * Get displayName.
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     * @return UserInterface
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }
}
