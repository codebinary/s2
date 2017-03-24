<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackendBundle\Entity\User;
use BackendBundle\Form\UserType;

class CcpucpController extends Controller
{


    public function listAction(Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $data = $em->getRepository("BackendBundle:FormCcpucp");

        $ccpucp = $data->findAll();

        return $this->render("BackendBundle:Ccpucp:index.html.twig", array(
            "data" => $ccpucp
        ));
    }

    public function deleteAction(Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $ccpucpRepo = $em->getRepository("BackendBundle:Ccpucp");

        $ccpucp = $ccpucpRepo->find($id);

        $em->remove($ccpucp);
        $em->flush();

        return $this->redirectToRoute("backend_admin_list_ccpucp");

    }

}
