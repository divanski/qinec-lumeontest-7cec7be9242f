<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
class DoctorRepository implements RepositoryInterface
{
    /**
     * @param $id
     * @return Doctor
     */
    public function selectById($id)
    {
        // TODO: Implement selectById() method.
    }
    /**
     * @param \AppBundle\Entity\Hospital $hospital
     * @return Doctor[]
     */
    public function selectByHospital($hospital){}
}
