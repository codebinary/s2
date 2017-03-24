<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackendBundle\Entity\User;
use BackendBundle\Form\UserType;


class UserController extends Controller
{
    public function loginAction(Request $request){

    	
    	//Authentication 
    	$authenticationUtils = $this->get("security.authentication_utils");

    	
    	$error = $authenticationUtils->getLastAuthenticationError();
    	$lastUsername = $authenticationUtils->getLastUsername();

    	return $this->render(
    		"BackendBundle:User:login.html.twig", array(
    			"error" => $error,
    			"last_username" => $lastUsername
    	));

    }

    public function listAction(Request $request){


        return $this->render("BackendBundle:User:index.html.twig");

    }

    public function createAction(Request $request){

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $user = new User();
            $user->setName($form->get("name")->getData());
            $user->setSurname($form->get("surname")->getData());
            $user->setEmail($form->get("email")->getData());

            $factory = $this->get("security.encoder_factory");
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());

            $user->setPassword($password);
            $user->setRole('ROLE_USER');
            $user->setImage(null);
            $user->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $flush = $em->flush();

            if($flush){
                $status  = "El usuario se ha creado correctamente";
            }else{
                $status = "No te has registrado correctamente";
            }
            
        }else{
            $status = "No te has registrado correctamente";
        }

        return $this->render("BackendBundle:User:create.html.twig", array(
            "form" => $form->createView(),
            "status" => $status
        ));

    }
}
