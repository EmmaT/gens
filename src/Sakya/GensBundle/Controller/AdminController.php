<?php

namespace Sakya\GensBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sakya\GensBundle\Entity\Libro;
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

        return $this->render('GensBundle:Admin:dashboard.html.twig', array
        	('form'=>$form->createView()));
    }

    public function dashboardAction()
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

        return $this->render('GensBundle:Admin:dashboard.html.twig', array
        	('form'=>$form->createView()));
    }

    
}
