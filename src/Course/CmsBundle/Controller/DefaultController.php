<?php

namespace Course\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CourseCmsBundle:Default:index.html.twig');
    }
}
