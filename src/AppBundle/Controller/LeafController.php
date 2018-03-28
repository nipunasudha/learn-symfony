<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LeafController extends Controller
{
    /**
     * @Route("/leaf/list")
     */
    public function listLeafAction()
    {
        return $this->render('@App/Leaf/list_leaf.html.twig', array(
        ));
    }

    /**
     * @Route("/leaf/add")
     */
    public function addLeafAction()
    {
        return $this->render('@App/Leaf/add_leaf.html.twig', array(
        ));
    }

}
