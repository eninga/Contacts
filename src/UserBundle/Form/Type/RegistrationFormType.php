<?php

namespace UserBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('email', null, array(
            'label' => "Email",
            'attr' => array(
                'placeholder' => 'Email',
                'class' => 'form-control'
            )
        ));
        $builder->add('username', null, array(
            'label' => "Pseudo",
            'attr' => array(
                'placeholder' => 'Pseudo',
                'class' => 'form-control'
            )
        ));
        $builder->add('lastName', null, array(
            'label' => "Nom",
            'attr' => array(
                'placeholder' => 'Nom',
                'class' => 'form-control'
            )
        ));
        $builder->add('firstName', null, array(
            'label' => "Prénom",
            'attr' => array(
                'placeholder' => 'Prénom',
                'class' => 'form-control'
            )
        ));
        $builder->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
            'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'form.password','attr' => array(
                'placeholder' => 'form.password',
                'class' => 'form-control'
            )),
            'second_options' => array('label' => 'form.password_confirmation','attr' => array(
                'placeholder' => 'form.password_confirmation',
                'class' => 'form-control'
            )),
            'invalid_message' => 'fos_user.password.mismatch',
        ));
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

}
