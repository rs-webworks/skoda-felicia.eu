<?php

namespace AppBundle\Form\Download;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class DownloadForm extends AbstractType
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
                'class' => 'AppBundle\Entity\Download\Category',
                'choice_label' => 'title'
            ))
            ->add('imageFile', VichImageType::class, array(
                'label' => 'Obrázek',
                'required' => false))
            ->add('file', VichFileType::class, array(
                'label' => 'Soubor',
                'required' => false))
            ->add('description', TextareaType::class, array(
                'required' => false, // This is because codeMirror fills input only on save, thus causing an error
                'label' => 'Popis (HTML)',
                'attr' => array('class' => 'htmlCodeMirror')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Download\Download',
        ));
    }
}