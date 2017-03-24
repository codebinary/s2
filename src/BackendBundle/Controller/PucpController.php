<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackendBundle\Entity\User;
use BackendBundle\Form\UserType;

class PucpController extends Controller
{
   
    public function listAction(Request $request){

    	$em = $this->getDoctrine()->getEntityManager();
    	$data = $em->getRepository("BackendBundle:FormPucp");

    	$pucp = $data->findAll();

        return $this->render("BackendBundle:Pucp:index.html.twig", array(
        	"data" => $pucp
        ));

    }
}
