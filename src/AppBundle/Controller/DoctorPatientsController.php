<?php namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DoctorPatientsController extends Controller
{
    /**
     * @route /set-doctor
     * @param Request $request
     * @return JsonResponse
     */
    public function setDoctorAction(Request $request)
    {
        $doctor = $this->getDoctrine()
            ->getRepository('AppBundle:Doctor')
            ->find($request->get('doctor_id'));

        if (!$doctor) {
            throw $this->createNotFoundException(
                'No Doctor found'
            );
        }

        $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository('AppBundle:Patient')
                    ->find($request->get('patient_id'));

        if (!$patient) {
            throw $this->createNotFoundException(
                'No Patient found'
            );
        }

        $patient->setDoctor($doctor);
        $em->flush();

        return new JsonResponse(array(
            'patients' => $doctor->getPatients(),
            'doctor' => $doctor,
            'msg' => 'This is the all patients assigned to '. $doctor->getName(),
        ));
    }
}