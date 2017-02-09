<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zdravkov
 * Date: 9.2.2017 г.
 * Time: 13:42
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DoctorPatientsController extends Controller
{
    /**
     * @route /doctor-to-patient
     * @param $did
     * @param $pid
     *
     * @return JsonResponse
     */
    public function setDoctorToPatientAction($did, $pid)
    {
        $em = $this->getDoctrine()->getManager();
        
        $doctor = $em->getRepository('AppBundle:Doctor')->selectById($did);
        $patient = $em->getRepository('AppBundle:Patient')->selectById($pid);
    
        $patient->setDoctor($doctor);
        
        return new JsonResponse(array(
            'patients' => $patient,
            'doctor' => $doctor,
            'msg' => 'Here are the patients for '. $doctor->getName()
        ));
    }
    
}