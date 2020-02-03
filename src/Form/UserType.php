<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'Administrateur' => '["ROLE_ADMIN"]',
                    'Modérateur' => '["ROLE_MODO"]',
                    'Modérateur Section(Vue uniquement)' => '["ROLE_USER"]',
                ],
    
            ])
            ->add('sectionOwner', EntityType::class, [
                'class' => Section::class,
                'choice_label' => 'name', ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
