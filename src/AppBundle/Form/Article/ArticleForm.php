<?php

namespace AppBundle\Form\Article;

use BFOS\TwigExtensionsBundle\Form\Type\DatePickerType;
use BFOS\TwigExtensionsBundle\Form\Type\DateTimePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArticleForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titulek souboru'))
            ->add('category', EntityType::class, array(
                'label' => 'Kategorie',
                'class' => 'AppBundle\Entity\Article\Category',
                'choice_label' => 'title'
            ))
            ->add('author', TextType::class, array('label' => 'Autor'))
            ->add('createdAt', DateTimeType::class, array('label' => 'Vytvořeno'))
            ->add('updatedAt', DateTimeType::class, array('label' => 'Změněno', 'required' => false))
            ->add('perex', TextareaType::class, array('label' => 'Perex', 'required' => false))
            ->add('published', CheckboxType::class, array('label' => 'Publikováno'))
            ->add('imageFile', VichImageType::class, array(
                'label' => 'Obrázek',
                'required' => false))
            ->add('content', TextareaType::class, array(
                'required' => false, // This is because codeMirror fills input only on save, thus causing an error
                'label' => 'Obsah (HTML+Twig+JS)',
                'attr' => array('class' => 'htmlCodeMirror')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article\Article',
        ));
    }
}