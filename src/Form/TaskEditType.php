<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\User;
use App\Entity\Section;
use App\Entity\TaskCategorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre')
        ->add('author', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'username', ])
        ->add('createdAt', DateType::class, [
            'placeholder' => [
                'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
            ]
        ])
        ->add('content',TextareaType::class, [
            'attr' => ['class' => 'tinymce'],
        ])
        ->add('section', EntityType::class, [
            'class' => Section::class,
            'choice_label' => 'name', ])
        ->add('taskCategorie', EntityType::class, [
            'class' => TaskCategorie::class,
            'choice_label' => 'name', ])
        ->add('urlDoc')
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
