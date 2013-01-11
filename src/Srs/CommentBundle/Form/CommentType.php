<?php

namespace Srs\CommentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Trsteel\CkeditorBundle\Form\Type\CkeditorType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('body', 'ckeditor');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srs\CommentBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'srs_commentbundle_commenttype';
    }
}


