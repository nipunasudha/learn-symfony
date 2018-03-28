<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Leaf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class LeafController extends Controller
{
    /**
     * @Route("/leaf/list", name="list_leaf")
     */
    public function listLeafAction()
    {
        $leafs = $this->getDoctrine()->getRepository('AppBundle:Leaf')
            ->findAll();
        return $this->render('@App/Leaf/list_leaf.html.twig', array(
            'leafs' => $leafs
        ));
    }

    /**
     * @Route("/leaf/add", name="add_leaf")
     */
    public function addLeafAction(Request $request)
    {

        $leaf = new Leaf;

        $form = $this->createFormBuilder($leaf)
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('seller', TextType::class)
            ->add('save', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary '
                )
            ))->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $title = $form['title']->getData();
            $description = $form['description']->getData();
            $seller = $form['seller']->getData();
            $leaf->setTitle($title);
            $leaf->setDescription($description);
            $leaf->setSeller($seller);

            $em = $this->getDoctrine()->getManager();
            $em->persist($leaf);
            $em->flush();
            return $this->redirectToRoute('list_leaf');
        }
        return $this->render('@App/Leaf/add_leaf.html.twig', array('form' => $form->createView()));
    }

}
