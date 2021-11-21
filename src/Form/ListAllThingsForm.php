<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Category;

class ListAllThingsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        if (empty($options['collection_type']) || !$options['collection_type'] instanceof AbstractType) {
//            throw new \InvalidArgumentException();
//        }
//        $builder->add('rows', 'collection', array('type' => $options['collection_type']));
//        $builder->add('save', 'submit', array('label' => 'Save'));

    }
}