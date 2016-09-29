<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Reply;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', TextareaType::class, ['label' => 'Réponse', 'attr' => ['cols' => 40]])
            ->add('author', TextType::class, ['label' => 'Nom'])
            ->add('authorEmail',EmailType::class, ['label' => 'Email'])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'data_class' => Reply::class,
                    'method' => 'POST',
                ]
            );
    }
}