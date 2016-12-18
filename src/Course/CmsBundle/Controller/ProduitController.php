<?php

namespace Course\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Course\MainBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProduitController extends Controller
{
    /**
     * @param Request $request
     * @param Produit $produit
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Produit $produit)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($produit);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Le produit "'.$produit->getNom().'" a été supprimé');

        return $this->redirect($this->generateUrl('course_cms_homepage'));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('CourseMainBundle:Produit')->findAll();

        foreach($produits as $produit)
        {
            $em->remove($produit);
        }

        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'La liste de courses a été vidée');

        return $this->redirect($this->generateUrl('course_cms_homepage'));
    }
}
