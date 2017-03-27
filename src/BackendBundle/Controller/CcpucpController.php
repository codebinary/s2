<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use BackendBundle\Entity\User;
use BackendBundle\Entity\Ccpucp;
use BackendBundle\Form\UserType;

class CcpucpController extends Controller
{

    private $session;

    public function __construct(){
        $this->session = new Session();
    }

    public function listAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository("BackendBundle:FormCcpucp");

        $ccpucp = $data->findAll();

        return $this->render("BackendBundle:Ccpucp:index.html.twig", array(
            "data" => $ccpucp
        ));
    }

    public function deleteAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $ccpucpRepo = $em->getRepository("BackendBundle:FormCcpucp");

        $ccpucp = $ccpucpRepo->find($id);

        $em->remove($ccpucp);
        $flush = $em->flush();

        /*if($flush){
            $status = "Se eliminó correctamente";
            $this->session->getFlashBag()->add("status", $status);
        }*/

        $status = "Se eliminó correctamente";
            $this->session->getFlashBag()->add("status", $status);
        return $this->redirectToRoute("backend_admin_list_ccpucp");

    }

}
