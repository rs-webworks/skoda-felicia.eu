<?php

namespace AppBundle\Form\Article;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CategoryForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titulek kapitoly'))
            ->add('icon', TextType::class, array('label' => 'Třída FA icony (např. "times", bez fa-)'))
            ->add('parent', EntityType::class, array(
                'label' => 'Podkategorií pro',
                'class' => 'AppBundle\Entity\Article\Category',
                'choice_label' => 'title',
                'required' => false

            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article\Category',
        ));
    }
}