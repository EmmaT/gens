<?php

namespace Sakya\GensBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sakya\GensBundle\Entity\Libro;
use Sakya\GensBundle\Entity\Capitulo;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT l.libro, l.prefacio
            FROM GensBundle:Libro l');

        $listalibros = $query->getResult();

        return $this->render('GensBundle:Default:index.html.twig', 
        	array('listalibros' => $listalibros));
    }

    public function showlibroAction($libro)
    {

        $querylibro = $this->getDoctrine()->getManager()->createQuery(
            'SELECT l.libro, l.autor
               FROM GensBundle:Libro l
              WHERE l.libro = :libro'
              )->setParameter('libro', $libro);

        $milibro = $querylibro->getResult();

        $querycapitulo = $this->getDoctrine()->getManager()->createQuery(
            'SELECT c.capitulo
               FROM GensBundle:Libro l
               JOIN l.capitulo c
              WHERE l.libro = :libro'
        )->setParameter( 'libro', $libro);
        
        $listacapitulos = $querycapitulo->getResult();


        return $this->render('GensBundle:Default:showlibro.html.twig', 
            array('milibro' => $milibro, 'listacapitulos' => $listacapitulos));


    }

    public function showcapituloAction($libro, $capitulo)
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT c.contenido
               FROM GensBundle:Libro l
               JOIN l.capitulo c
              WHERE l.libro = :libro AND c.numerocapitulo = :numerocapitulo'
        )->setParameters(array(
                            'libro' => $libro,
                             'numerocapitulo'  => $capitulo,));
        $micapitulo = $query->getResult();



        return $this->render('GensBundle:Default:showcapitulo.html.twig', 
            array('micapitulo' => $micapitulo));
    }
}
