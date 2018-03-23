<?php

namespace EvenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {


        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('EvenementBundle:Default:index.html.twig', array(
            'user'=>$user,

        ));


    }

}
