<?php

use Symfony\Component\HttpFoundation\Request;

// Modification by Ivan
use Symfony\Component\HttpFoundation\JsonResponse;
use \AppBundle\Repository\HospitalRepository as Hospital;
use \AppBundle\Repository\PatientRepository as Patients;
use Doctrine\ORM\EntityNotFoundException;

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__.'/../app/autoload.php';
$request = Request::createFromGlobals();

function getHospitalPatients() {
	global $request;

	$hospitalId = $request->get('hospitalId');

	// Let's check to see if we have received the hospital id
	if (empty($hospitalId) && isset($hospitalId)) {
		return new JsonResponse(array(
			'msg' => 'No hospital information received'
		));
	}

//	$hospitalRepository = new \AppBundle\Repository\HospitalRepository();
//	$patientRepository = new \AppBundle\Repository\PatientRepository();
    
	$hospitalRepository = new Hospital();
	$patientRepository = new Patients();
    
    try{
        $hospital = $hospitalRepository->selectById($hospitalId);
        $patients = $patientRepository->selectByHospital($hospital);
        
        // Return a list of patients along with the original hospital and a message showing success
        return new JsonResponse(array(
            'patients' => $patients,
            'hospital' => $hospital,
            'msg' => 'Here are the patients for '.$hospital->getName()
        ));
        
    }catch(EntityNotFoundException $e){
        error_log($e->getMessage());
    }
}

return getHospitalPatients();