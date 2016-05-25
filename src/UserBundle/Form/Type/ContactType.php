<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array(
            'label' => "Nom",
            'attr' => array(
                'placeholder' => 'Nom',
                'class' => 'form-control'
            )
        ))
            ->add('prenom', null, array(
            'label' => "Prénom",
            'attr' => array(
                'placeholder' => 'Prénom',
                'class' => 'form-control'
            )
        ))
            ->add('email', null, array(
            'label' => "Email",
            'attr' => array(
                'placeholder' => 'Email',
                'class' => 'form-control'
            )
        ))
            ->add('telephone', null, array(
            'label' => "Telephone",
            'attr' => array(
                'placeholder' => 'Telephone',
                'class' => 'form-control'
            )
        ))
            ->add('adresse', null, array(
            'label' => "Adresse",
            'attr' => array(
                'placeholder' => 'Adresse',
                'class' => 'form-control'
            )
        ))
            ->add('url', null, array(
            'label' => "Site web",
            'attr' => array(
                'placeholder' => 'Site web',
                'class' => 'form-control'
            )
        ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Contact'
        ));
    }
}
