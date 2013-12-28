<?php

namespace Sakya\GensBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sakya\GensBundle\Entity\Libro;
use Sakya\GensBundle\Entity\Capitulo;
use Symfony\Component\HttpFoundation\Request;
use Sakya\GensBundle\Form\Type\LibroType;

class AdminController extends Controller
{
    public function crearLibroAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$request = $this->getRequest();
    	$libro = new Libro();
    	$form = $this->createForm(new LibroType(), $libro);

    	$form->handleRequest($request);
 
    if ($form->isValid()) {
 
        // guardar la tarea en la base de datos
        $em->persist($libro);
        $em->flush();
 
        return $this->redirect($this->generateUrl('dashboard'));
    }

        return $this->render('GensBundle:Admin:crearlibro.html.twig', array
        	('form'=>$form->createView()));
    }

    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT l.libro, l.slug
            FROM GensBundle:Libro l');

        $listalibros = $query->getResult();

        return $this->render('GensBundle:Admin:dashboard.html.twig', array(
            'listalibros' => $listalibros));
    }

    public function editarLibroAction($libro)
    {
        //Seleccionar el libro a editar
        $em = $this->getDoctrine()->getManager();
        $entity = $em2 = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT l
            FROM GensBundle:Libro l
            WHERE l.slug = :libro'
              )->setParameter('libro', $libro);
        $milibro = $query->getResult();

        //Obtenemos la petición y seteamos los valores adecuados del libro
        //Con un foreach... esta es nueva...
        $request = $this->getRequest();
        $libro = new Libro();
        foreach ($milibro as $key) {
            $libro->setlibro($key->getlibro());
            $libro->setautor($key->getautor());
            $libro->setprefacio($key->getprefacio());
        }
        
        $form = $this->createForm(new LibroType(), $libro);

        $form->handleRequest($request);
    
    if ($form->isValid()) {
    
        // guardar la tarea en la base de datos
        $em2->persist($entity);
        $em2->flush();
    
        return $this->redirect($this->generateUrl('dashboard'));
    }

        return $this->render('GensBundle:Admin:editarlibro.html.twig', array
            ('formEditarLibro'=>$form->createView()));
    }

    
}
