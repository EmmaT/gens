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

    	$listalibros = $this->getDoctrine()
    	        ->getRepository('GensBundle:Libro')
    	        ->findAll();
    	 
    	    if (!$listalibros) {
    	        throw $this->createNotFoundException(
    	            'No se han encontrado ningún Libro'
    	        );
    	    }
        return $this->render('GensBundle:Default:index.html.twig', 
        	array('listalibros' => $listalibros));
    }

    public function showlibroAction($libro)
    {
        $milibro = $this->getDoctrine()
                ->getRepository('GensBundle:Libro')
                ->findOneBylibro($libro);

        
        $listacapitulos = $milibro->getCapitulo();

        return $this->render('GensBundle:Default:showlibro.html.twig', 
            array('libro' => $libro, 'listacapitulos' => $listacapitulos));


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

        /*$micapitulo = $this->getDoctrine()
                ->getRepository('GensBundle:Capitulo')
                ->findBynumerocapitulo($capitulo);

        //$milibro = $micapitulo->get*/

        return $this->render('GensBundle:Default:showcapitulo.html.twig', 
            array('micapitulo' => $micapitulo));
    }
}
