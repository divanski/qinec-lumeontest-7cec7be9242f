<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zdravkov
 * Date: 9.2.2017 г.
 * Time: 13:10
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use Doctrine\ORM\EntityRepository;

class DoctorRepository implements RepositoryInterface
{
    /**
     * @return Doctor
     */
    public function selectById($id){}
    
    /**
     * @param \AppBundle\Entity\Hospital $hospital
     * @return Doctor[]
     */
    public function selectByHospital($hospital){}
}