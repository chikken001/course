<?php

namespace Course\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CourseBackOfficeBundle:Default:index.html.twig');
    }
}
