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
        for ($i=1; $i < 200; $i++) { 
            $capituloXenoi = new Capitulo();
            $capituloXenoi->setlibro($this->getReference('libro-xenoi'));
            $capituloXenoi->setcapitulo('Holitas '.$i.'  - Xenoi');
            $capituloXenoi->setnumerocapitulo($i);
            $capituloXenoi->setcontenido('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Verbum defuturum tuum mortem affert naturales eloquentiam expeteremus. Mens hortensio ponendam scilicet illaberetur expectant comparat. Equidem primo velit afferat leviora efficeretur isti primisque, te plura nesciunt eosdem sumus homine puto responsum romanum consulatu, plerique exiguam. Inflammati neglegentur libero aliquos, tali nullo illas audita aetatis, sanos scribimus hausta extremum reliqui specie credo disputatum desiderare infantes, atomorum gustare aegritudinem. Debet meam animi profecto oculis eo forte, chrysippi splendide periculis inprobitatem primus esse fallare cyrenaicisque.');
            $manager->persist($capituloXenoi);
        }
        
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