<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('question',EntityType::class, [
                    'class' => Question::class

                ])
            ->add('title')

            ->add('is_right',ChoiceType::class,[
                'choices' => ['No' => 0,
                    'Yes' => 1
                ]
            ])
            ->add('submit',SubmitType::class,[
                'attr' => [
                    'class' =>'btn btn-dark float-right'
                ]
            ])
        ;

        }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
