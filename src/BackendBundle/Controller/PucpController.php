<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use BackendBundle\Entity\User;
use BackendBundle\Form\UserType;

class PucpController extends Controller
{

	private $session;

	public function __construct(){
		$this->session = new Session();
	}
   
    public function listAction(Request $request){

    	$em = $this->getDoctrine()->getManager();
    	$data = $em->getRepository("BackendBundle:FormPucp");

    	$pucp = $data->findAll();

        return $this->render("BackendBundle:Pucp:index.html.twig", array(
        	"data" => $pucp
        ));

    }


    public function deleteAction($id){

    	$em = $this->getDoctrine()->getEntityManager();
    	$pucpRepo = $em->getRepository("BackendBundle:FormPucp");

    	$pucp = $pucpRepo->find($id);
    	$em->remove($pucp);

    	$flush = $em->flush();

    	$status = "Se eliminó correctamente";

    	$this->session->getFlashBag()->add("status", $status);
    	return $this->redirectToRoute("backend_admin_list_pucp");
    }
}
