<?php

namespace Srs\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('body', 'textarea')
            /*->add('tag',  'collection', array('type'         => new TagType(),
                                                'allow_add'    => true,
                                                'allow_delete' => true,
                                                'by_reference' => false))*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srs\EventBundle\Entity\Event'
        ));
    }

    public function getName()
    {
        return 'srs_eventbundle_eventtype';
    }
}
