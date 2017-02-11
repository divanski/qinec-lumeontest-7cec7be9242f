<?php
/**
 * Created by PhpStorm.
 * User: izdra
 * Date: 11-Feb-17
 * Time: 21:34
 */
namespace AppBundle\Tests\Repository;

use AppBundle\Entity\Hospital;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DoctorRepositoryFunctionalTest extends KernelTestCase
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
        $doctor = $this ->em
                        ->getRepository('AppBundle:Doctor')
                        ->selectById('1');
        $this->assertCount(1, $doctor);
    }

    public function testGetDoctorsInHosptal(Hospital $hospital)
    {
        $doctors = $this ->em
                        ->getRepository('AppBundle:Doctor')
                        ->selectByHospital($hospital);
        $this->assertCount(1, $doctors);
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