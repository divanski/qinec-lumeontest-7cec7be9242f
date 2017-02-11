<?php
/**
 * Created by PhpStorm.
 * User: izdra
 * Date: 11-Feb-17
 * Time: 22:09
 */

namespace AppBundle\Tests\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Hospital;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PatientRepositoryFunctionalTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchById()
    {
        $patient = $this ->em
            ->getRepository('AppBundle:Patient')
            ->selectById('1');
        $this->assertCount(1, $patient);
    }

    public function testGetPatientOnDoctor(Doctor $doctor)
    {
        $patients = $this ->em
            ->getRepository('AppBundle:Doctor')
            ->selectByDoctor($doctor);
        $this->assertCount(1, $patients);
    }

    public function testGetPatientInHosptal(Hospital $hospital)
    {
        $patients = $this ->em
            ->getRepository('AppBundle:Doctor')
            ->selectByHospital($hospital);
        $this->assertCount(1, $patients);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}