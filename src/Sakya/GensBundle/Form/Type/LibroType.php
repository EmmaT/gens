<?php

namespace Sakya\GensBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class LibroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libro', 'text');
        $builder->add('slug', 'text');
        $builder->add('autor', 'text');
        $builder->add('prefacio', 'textarea', array(
        'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'bbcode' // Skip it if you want to use default theme
        )
    ));
        $builder->add('save', 'submit');


    }
 
    public function getName()
    {
        return 'libro';
    }
}