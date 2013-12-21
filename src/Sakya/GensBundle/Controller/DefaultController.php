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
        $micapitulo = $this->getDoctrine()
                ->getRepository('GensBundle:Capitulo')
                ->findOneBy(array('libro' => $libro, 'capitulo' => $capitulo));
        return $this->render('GensBundle:Default:showcapitulo.html.twig');
    }
}
