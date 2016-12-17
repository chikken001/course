<?php

namespace Course\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CourseFrontOfficeBundle:Default:index.html.twig');
    }
}
