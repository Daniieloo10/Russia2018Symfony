<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\Evenement;
use EvenementBundle\Entity\Participation;
use EvenementBundle\Form\EvenementType;
use EvenementBundle\Form\ModifierType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EvenementBundle\Repository\EvenementRepository;

class EventController extends Controller
{
 public function ajoutPubAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $event = new Evenement();
        $event->setIduser($this->container->get('security.token_storage')->getToken()->getUser()->getId());

        $event->setDateevenement(new \DateTime('now'));


        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
         //  $event->uploatProfilePicture();
            $em->persist($event);
            $em->flush();
         return $this->redirectToRoute('list_event');
        }
        return $this->render('@Evenement/Front/AjoutEvent.html.twig', array(
            'form'=>$form->createView(),
            'user'=>$user
        ));

    }

    public function listEventsAction()
    {
        $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        $ev = new Evenement();

        $array = array() ;
        $array = $evenements;




            $participe = $this->getDoctrine()->getRepository('EvenementBundle:Participation')->findParticipantDQL($userid,124);








        return $this->render('@Evenement/Front/affichage.html.twig',array(
            'events'=>$evenements,

        ));

    }
    public function listEventsBackAction()
    {
        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();


        return $this->render('@Evenement/Back/listEventsBack.html.twig',array(
            'events'=>$evenements
        ));
     }

    public function afficherDetailsBackAction(Request $request,$id)
    {
        //$id = $request->get('id');
        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);


        return $this->render('@Evenement/Back/detailsEventBack.html.twig', array(

            'event' => $event

        ));
      }

    public function SupprimerEventAction($id)
    {  $event = $this->getDoctrine()
        ->getRepository('EvenementBundle:Evenement')
        ->find($id);
        $em =$this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('list_Back');

      }

    public function modifBackAction(Request $request,$id)
    {
        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);
        $form = $this->createForm(ModifierType::class, $event);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('list_Back');
        }
        return $this->render('@Evenement/Back/modifBack.html.twig', array(
            'form'=>$form->createView(),
            'event' => $event
        ));

      }

    public function redirHomeAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('@Evenement/Template/template1.html.twig',array(
            'user'=>$user,
        ));
        
      }



    public function detailsEventAction(Request $request,$id)
    {
        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('@Evenement/Front/detailsEvent.html.twig', array(

            'event' => $event,
            'user'=>$user
        ));
    }

    public function participerAction(Request $request,$id)
    {

        $events = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->participationDql($id);
        $iduser=$this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $participe = $this->getDoctrine()->getRepository('EvenementBundle:Participation')->findParticipantDQL($iduser,$id);


        $participation  = new Participation();
        $participation->setIduser($iduser);
        $participation->setIdevenement((int)$id);
         $em = $this->getDoctrine()->getManager();
        //  $event->uploatProfilePicture();
        $em->persist($participation);
        $em->flush();

        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        return $this->render('@Evenement/Front/affichage.html.twig',array(
            'events'=>$evenements
        ));

    }

    public function mesPubsAction()
    {
        $iduser=$this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $events = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->pubsDql($iduser);


        return $this->render('@Evenement/Front/mesPubs.html.twig',array(
            'events'=>$events
        ));

    }

    public function supprimerFrontAction($id)
    {
        {  $event = $this->getDoctrine()
            ->getRepository('EvenementBundle:Evenement')
            ->find($id);
            $em =$this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
            return $this->redirectToRoute('mesPubs_Event');

        }
     }

    public function modifAction( Request $request , $id)
    {

      return $this->render('@Evenement/Front/modifMesPub.html.twig');

     }








 }
