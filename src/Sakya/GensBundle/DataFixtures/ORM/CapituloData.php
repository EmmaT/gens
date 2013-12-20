<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadUserData.php
namespace Sakya\GensBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sakya\GensBundle\Entity\Capitulo;

class CapituloData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $capituloXenoi = new Capitulo();
        $capituloXenoi->setlibro($this->getReference('libro-xenoi'));
        $capituloXenoi->setcapitulo('Capitulo 1 - Xenoi');
        $capituloXenoi->setnumerocapitulo(1);
        $capituloXenoi->setcontenido('Lorem ipsum dolor ammet');

        $manager->persist($capituloXenoi);
        $manager->flush();

        $this->addReference('capitulo-xenoi', $capituloXenoi);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}