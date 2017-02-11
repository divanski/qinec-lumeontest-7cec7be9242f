<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zdravkov
 * Date: 9.2.2017 г.
 * Time: 13:06
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorRepository")
 */
class Doctor
{
    /** @var  int */
    private $id;
    
    /** @var  string */
    private $name;
    
    /** @var  string */
    private $specialty;
    
    /** @var  Hospital */
    private $hospital;

    /** @ORM\OneToMany(targetEntity="Patient", mappedBy="doctor") */
    private $patients;

    public function __construct()
    {
        $this->patients = new ArrayCollection();
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return Doctor
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return Doctor
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }
    
    /**
     * @param string $specialty
     * @return Doctor
     */
    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
        return $this;
    }
    
    /**
     * @return Hospital
     */
    public function getHospital()
    {
        return $this->hospital;
    }
    
    /**
     * @param Hospital $hospital
     * @return Doctor
     */
    public function setHospital($hospital)
    {
        $this->hospital = $hospital;
        return $this;
    }
    
}
