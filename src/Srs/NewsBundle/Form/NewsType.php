<?php

namespace Srs\NewsBundle\Form;

use Srs\TagBundle\Form\TagType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('tags',  'collection', array('type'         => new TagType(),
                                                'allow_add'    => true,
                                                'allow_delete' => true,
                                                'by_reference' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srs\NewsBundle\Entity\News'
        ));
    }

    public function getName()
    {
        return 'srs_newsbundle_newstype';
    }
}
