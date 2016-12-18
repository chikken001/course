<?php

namespace Course\CmsBundle\Form;

use Course\MainBundle\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'label' => false,
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nom du produit'
                )
            ))
            ->add('categorie', 'entity', array(
                'label' => false,
                'required' => true,
                'class' => 'Course\MainBundle\Entity\Categorie',
                'property' => 'nom',
                'empty_data' =>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('submit', 'submit', array(
                'label' => 'Ajouter',
                'attr' => array(
                    'class' => 'btn btn-secondary'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Course\MainBundle\Entity\Produit'
        ));
    }

    public function getName()
    {
        return 'course_cms_produit_type';
    }
}
