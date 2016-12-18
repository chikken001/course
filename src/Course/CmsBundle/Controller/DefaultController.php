<?php

namespace Course\CmsBundle\Controller;

use Course\CmsBundle\Form\ProduitType;
use Course\MainBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CourseMainBundle:Categorie')->findAll();

        $produit = new Produit();

        $produitForm = $this->createForm(new ProduitType(), $produit, array(
            'action' => $this->generateUrl('course_cms_homepage'),
        ));

        if ($request->getMethod() == 'POST')
        {
            $produitForm->handleRequest($request);

            if ($produitForm->isValid())
            {
                $em->persist($produit);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Le produit "'.$produit->getNom().'" a été ajouté');

                return $this->redirect($this->generateUrl('course_cms_homepage'));
            }
        }

        return $this->render('CourseCmsBundle:Default:index.html.twig', array(
            'categories' => $categories,
            'form' => $produitForm->createView()
        ));
    }
}
