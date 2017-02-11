<?php
/**
 * Created by PhpStorm.
 * User: izdra
 * Date: 11-Feb-17
 * Time: 22:24
 */
namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DoctorPatientsControllerTest extends WebTestCase
{
    public function setDoctorAction()
    {
        $client = static::createClient();
        $data = array(
            'doctor_id' => '1',
            'patient_id' => '1'
        );

        $client->request('POST', '/set-doctor', $data);

        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode()); // Test if response is OK

        $this->assertSame('application/json', $response->headers->get('Content-Type')); // Test if Content-Type is valid application/json

        $this->assertEquals('{"success":"true"}', $response->getContent()); // Test if everything is ok

        $this->assertNotEmpty($client->getResponse()->getContent());// Test that response is not empty
    }
}