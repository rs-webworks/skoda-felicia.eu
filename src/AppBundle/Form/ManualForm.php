<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ManualForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titulek kapitoly'))
            ->add('engines', EntityType::class, array(
                'label' => 'Motorizace',
                'class' => 'AppBundle\Entity\Engine',
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true
            ))
            ->add('content', TextareaType::class, array(
                'required' => false, // This is because codeMirror fills input only on save, thus causing an error
                'label' => 'Obsah (HTML)',
                'attr' => array('class' => 'htmlCodeMirror')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Manual\Manual',
        ));
    }
}