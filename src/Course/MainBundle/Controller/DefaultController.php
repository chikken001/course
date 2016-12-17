<?php

namespace Course\MainBundle\Controller;

use Course\MainBundle\Entity\Centre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CourseMainBundle:Default:index.html.twig');
    }
}
