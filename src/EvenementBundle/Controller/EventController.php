<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\Commentaire;
use EvenementBundle\Entity\Evenement;
use EvenementBundle\Entity\Participation;
use EvenementBundle\Form\EvenementType;
use EvenementBundle\Form\ModifierType;
use EvenementBundle\Form\recherche;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use EvenementBundle\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class EventController extends Controller
{
    public function indexBackAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        $countEva = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->countEvaluations();
        $countEve = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->countEvenements();
        $countp = $this->getDoctrine()->getRepository('EvenementBundle:Participation')->countEvaluations();

        $evalusations = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->findAll();



        $e = array_sum($countEva);
        $ev = array_sum($countEve);
        $p = array_sum($countp);

        //var_dump($e);die() ;





        return $this->render('@Evenement/Back/index_back.html.twig',array(
            'evaluateurs'=>$evalusations,
            'user'=>$user,
            'events'=>$evenements,
            'evaluation'=>$e,
            'evvv'=>$ev,
            'participation'=>$p,


        ))  ;
    }

     public function ajoutPubAction(Request $request)
    {

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $event = new Evenement();
        $event->setIduser($this->container->get('security.token_storage')->getToken()->getUser());

        $event->setDateevenement(new \DateTime('now'));
        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($event);


      if(($form->isValid())&&($form->isSubmitted())) {



          if (count($errors) > 0) {
              /*
               * Uses a __toString method on the $errors variable which is a
               * ConstraintViolationList object. This gives us a nice string
               * for debugging.
               */
              $errorsString = (string)$errors;

            return new Response($errorsString);


          }

          $em = $this->getDoctrine()->getManager();
          //  $event->uploatProfilePicture();
          $em->persist($event);
          $em->flush();


          $request->getSession()
              ->getFlashBag()
              ->add('success', 'Lévénement a été ajouté avec succées ...!');

          $url = $this->generateUrl('ajout_event');

          return $this->redirect($url);
         // return new Response("Event created .. !");

      }
 // var_dump($session); die() ;


        return $this->render('@Evenement/Front/AjoutEvent.html.twig', array(
            'form'=>$form->createView(),
            'user'=>$user,

        ));


    }

    public function listEventsAction()
    {
        $nbrCom = new Commentaire();


        $events = new Evenement();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        $evntsBydate = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll(array('dateevenement' => 'desc'));
        $c = array() ;

            array_push($c,$evntsBydate[0]);
            array_push($c,$evntsBydate[1]);
             array_push($c,$evntsBydate[2]);

        $d = array();
            array_push($d,$evntsBydate[0]);
            array_push($d,$evntsBydate[1]);
            array_push($d,$evntsBydate[2]);
           // array_push()... 8 images je vais affiches

        //var_dump($evntsBydate);
       // $avg = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation(124);
        foreach ($evenements as $evenement)
      {
          $nbrCom = $this->getDoctrine()->getRepository('EvenementBundle:Commentaire')->nbrComentaires($evenement->getIdevenement());
          $evenement->setCountCommentaire(array_sum($nbrCom));

          $moy =$this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation($evenement->getIdevenement());
          $evenement->setMoyenne(array_sum($moy));
          $participe = $this->getDoctrine()->getRepository('EvenementBundle:Participation')->findParticipantDQL($userid,$evenement->getIdevenement());
          $eval = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->findEvaluateurDql($userid,$evenement->getIdevenement());
          if ($eval!=null) {
              $evenement->setEvalue(true);
          }
          else{
              $evenement->setEvalue(false);
          }
          if ($participe!=null) {
              $evenement->setParticipe(true);
          }
          else {
              $evenement->setParticipe(false);
          }
          //var_dump($evenement) ; die() ;
      }
      //var_dump($evenements[0]);
  return $this->render('@Evenement/Front/affichage.html.twig',array(
            'events'=>$evenements,
            'user'=>$user,
            'dates'=>$c,
            'i_footer'=>$d
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
        $user = $this->container->get('security.token_storage')->getToken()->getUser();



        return $this->render('@Evenement/Back/detailsEventBack.html.twig', array(
            'user'=>$user,
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
        return $this->redirectToRoute('index_back');

      }

    public function modifBackAction(Request $request,$id)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);
        $form = $this->createForm(ModifierType::class, $event);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            //return $this->redirectToRoute('index_back');
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Lévénement a été ajouté avec succées ...!');

            $url = $this->generateUrl('index_back');

            return $this->redirect($url);
        }
        return $this->render('@Evenement/Back/modifBack.html.twig', array(
            'form'=>$form->createView(),
            'event' => $event,
            'user'=>$user
        ));

      }

    public function redirHomeAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('@Evenement/Front/home.html.twig',array(
            'user'=>$user,
        ));
        
      }



    public function detailsEventAction(Request $request,$id)
    {
        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $nbrcom =$this->getDoctrine()->getRepository('EvenementBundle:Commentaire')->nbrComentaires($event->getIdevenement());

        $e= array_sum($nbrcom[0]) ;
        //var_dump($e);

        $coms = $this->getDoctrine()->getRepository('EvenementBundle:Commentaire')->mescomments($id);
        $moy =$this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation($event->getIdevenement());
        $event->setMoyenne(array_sum($moy));
     return $this->render('@Evenement/Front/detailsEvent.html.twig', array(
            'event' => $event,
            'user'=>$user,
            'countcom'=>$e,
            'comments'=>$coms
        ));
    }

    public function participerAction(Request $request,$id)
    {

        $events = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->participationDql($id);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $iduser=$this->container->get('security.token_storage')->getToken()->getUser()->getId();
       // $participe = $this->getDoctrine()->getRepository('EvenementBundle:Participation')->findParticipantDQL($iduser,$id);
        $participation  = new Participation();
        $participation->setIduser($iduser);
        $participation->setIdevenement((int)$id);
        $evntsBydate = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll(array('dateevenement' => 'desc'));
        $c= array() ;

        array_push($c,$evntsBydate[0]);
        array_push($c,$evntsBydate[1]);
        // array_push($c,$evntsBydate[2]);
        $d = array();
        array_push($d,$evntsBydate[0]);
        array_push($d,$evntsBydate[1]);
        array_push($d,$evntsBydate[2]);
        // array_push()... 8 images je vais affiches


        $em = $this->getDoctrine()->getManager();
            //  $event->uploatProfilePicture();
            $em->persist($participation);
            $em->flush();




        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        return $this->render('@Evenement/Front/affichage.html.twig',array(
            'events'=>$evenements,
            'user'=>$user,
            'dates'=>$c,
            'i_footer'=>$d
        ));

    }

    public function mesPubsAction()
    {
        $evntsBydate = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll(array('dateevenement' => 'desc'));

        // array_push()... 8 images je vais affiches
         $evenement = new Evenement();
        $iduser=$this->container->get('security.token_storage')->getToken()->getUser();
        $events = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->pubsDql($iduser->getId());
        //$avg = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation($events->get)
        $d = array();
        array_push($d,$evntsBydate[0]);
        array_push($d,$evntsBydate[1]);
        array_push($d,$evntsBydate[2]);
        // array_push()... 8 images je vais affiches

        $c = array() ;

        array_push($c,$evntsBydate[0]);
        array_push($c,$evntsBydate[1]);
        array_push($c,$evntsBydate[2]);


        //var_dump($evntsBydate);
        // $avg = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation(124);
        foreach ($events as $evenement) {
            $moy = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation($evenement->getIdevenement());
            $evenement->setMoyenne(array_sum($moy));
        }

        //var_dump($events); die() ;

        return $this->render('@Evenement/Front/mesPubs.html.twig',array(
            'events'=>$events,
            'user'=>$iduser,
            'dates'=>$c,
            'i_footer'=>$d
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
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $event = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->find($id);
        $form = $this->createForm(ModifierType::class, $event);
        $form->handleRequest($request);
        if ($form->isValid())
        {$em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();
        //return $this->redirectToRoute('list_event');
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Lévenement a été modifié avec succées ..!');

            $url = $this->generateUrl('mesPubs_Event');

            return $this->redirect($url);
        }

        return $this->render('@Evenement/Front/modifMesPub.html.twig', array(
            'form'=>$form->createView(),
            'user'=>$user,
            'event'=>$event
        ));



     }

    public function rechercheSimpleAction(Request $request)
    {
        $event = new Evenement();
        $form = $this->createForm(recherche::class, $event);
        $marques = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        $form->handleRequest($request);
        if ($form->isValid() && $event->getNomevenement()!=null) {
            $marques = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findBy(array(
                'nomevenement' =>$event->getNomevenement()
            ));
        }
        return $this->render('@Evenement/Front/listEvents.html.twig', array(
            'form' => $form->createView(),
            'events'=>$event
        ));
        
     }

    public function searchAction(Request $request)
    {
        $events = new Evenement();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $evenements = $this->getDoctrine()->getRepository('EvenementBundle:Evenement')->findAll();
        // $avg = $this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation(124);


        $c = array() ;
        foreach ($evenements as $evenement)
        {
            $moy =$this->getDoctrine()->getRepository('EvenementBundle:Evaluation')->avgEvaluation($evenement->getIdevenement());
            $evenement->setMoyenne(array_sum($moy));
        }


        if ($request->isXmlHttpRequest()) {
            //var_dump('error');die;
            $modele = $request->get('nom');
            $evenements = $this->getDoctrine()
                ->getRepository('EvenementBundle:Evenement')
                ->findDQL($modele);
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $result = $serializer->normalize($evenements);
            return new JsonResponse($result);
        }

            return $this->render('@Evenement/Front/affichage.html.twig',array(
                'events'=>$evenements,
                'user'=>$user,

            ));

        }

    public function Ajout_BackAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();


        $event = new Evenement();
        $event->setIduser($this->container->get('security.token_storage')->getToken()->getUser());

        $event->setDateevenement(new \DateTime('now'));
        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($event);


        if (($form->isValid()) && ($form->isSubmitted())) {


            if (count($errors) > 0) {
                /*
                 * Uses a __toString method on the $errors variable which is a
                 * ConstraintViolationList object. This gives us a nice string
                 * for debugging.
                 */
                $errorsString = (string)$errors;

                return new Response($errorsString);
            }

            $em = $this->getDoctrine()->getManager();
            //  $event->uploatProfilePicture();
            $em->persist($event);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Lévénement a été ajouté avec succées ...!');

            $url = $this->generateUrl('index_back');

            return $this->redirect($url);
            // return new Response("Event created .. !");

        }
        return $this->render('@Evenement/Back/Ajout_back.html.twig', array(
            'form'=>$form->createView(),
            'user'=>$user,

        ));

    }




}
