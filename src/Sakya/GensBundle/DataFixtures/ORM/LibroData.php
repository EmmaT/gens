<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadUserData.php
namespace Sakya\GensBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sakya\GensBundle\Entity\Libro;

class LibroData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i=1; $i < 200; $i++) { 
            $libroXenoi = new Libro();
            $libroXenoi->setlibro('Xenoi'.$i);
            $libroXenoi->setautor('Giancarlo Ventura Granados');
            $manager->persist($libroXenoi);
        }
        
        $manager->flush();

        $this->addReference('libro-xenoi', $libroXenoi);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}