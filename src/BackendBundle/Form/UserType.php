<?php

namespace BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array("label"=>"Nombre", "required" => "required", "attr" => array(
                "class"=>"form-control col-md-7 col-xs-12"
            )))
            ->add('surname', TextType::class, array("label"=>"Apellido", "required" => "required", "attr" => array(
                "class"=>"form-control col-md-7 col-xs-12"
            )))
            ->add('email', EmailType::class, array("label"=>"Email", "required" => "required", "attr" => array(
                "class"=>"form-control col-md-7 col-xs-12"
            )))
            ->add('password', PasswordType::class, array("label"=>"Contraseña", "required" => "required", "attr" => array(
                "class"=>"form-control col-md-7 col-xs-12"
            )))
            ->add('Guardar', SubmitType::class, array("attr" => array(
                "class"=>"form-control col-md-7 col-xs-12 btn btn-success"
            )))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\User'
        ));
    }
}
