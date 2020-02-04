<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Section;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', EmailType::class)
            ->add('password')
            ->add('confirm_password')
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'Administrateur (All Perm)' => 'ROLE_ADMIN',
                    'Modérateur (Update)' => 'ROLE_MODO',
                    'Modérateur Section(Vue uniquement)' => 'ROLE_USER',
                ],
                'expanded'  => false, // liste déroulante
                'multiple'  => true, // choix multiple
    
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
