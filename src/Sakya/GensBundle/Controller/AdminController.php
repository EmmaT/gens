<?php

namespace Sakya\GensBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sakya\GensBundle\Entity\Libro;
use Sakya\GensBundle\Entity\Capitulo;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('GensBundle:Admin:dashboard.html.twig');
    }

    
}
