<?php

namespace Course\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Course\MainBundle\Entity\Categorie;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategorieController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CourseMainBundle:Categorie')->findAll();

        return $this->render('@CourseCms/Categorie/liste.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * @return string
     */
    public function addCategorieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = $request->request->get('categorie')['nom'];

        $exist = $em->getRepository('CourseMainBundle:Categorie')->findOneByNom($nom);

        $response = new JsonResponse();

        if(!$exist)
        {
            $categorie = new Categorie();

            $categorie->setNom($nom);

            $em->persist($categorie);
            $em->flush();

            $id = $categorie->getId() ;

            $response->setData(array(
                'message' => 'ok',
                'id' => $id,
                'nom' => $nom
            ));
        }
        else
        {
            $response->setData(array(
                'message' => 'Cette catégorie existe déjà'
            ));
        }

        return $response;
    }

    /**
     * @return string
     */
    public function removeCategorieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id_categorie = (int) $request->request->get('id');
        $categorie = $em->getRepository('CourseMainBundle:Categorie')->find($id_categorie);

        if($categorie)
        {
            $em->remove($categorie);
            $em->flush();
        }

        $response = new JsonResponse();
        $response->setData(array(
            'message' => 'ok',
            'id' => $id_categorie
        ));

        return $response;
    }
}
