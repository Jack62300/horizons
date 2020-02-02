<?php

namespace App\Form;

use App\Entity\Task;
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
        ->add('author')
        ->add('createdAt', DateType::class, [
            'placeholder' => [
                'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
            ]
        ])
        ->add('content',TextareaType::class, [
            'attr' => ['class' => 'tinymce'],
        ])
        ->add('type', ChoiceType::class, [
            'choices'  => [
                'Développement Web' => "Développement web",
                'Administrations' => "Administration",
                'Communautaire' => "Communautaire",
                'Communication' => "Communication",
                'Technique' => "Technique",
                'Section Dofus' => "Section Dofus",
                'Section Apex' => "Section Apex",
                'Section Lol' => "Section Lol",
                'Section Wow' => "Section Wow",
                'Section R6' => "Section R6",
                'Section Overwatch' => "Section Overwatch",
            ],

        ])
        ->add('taskCategorie', EntityType::class, [
            'class' => TaskCategorie::class,
            'choice_label' => 'name', ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
