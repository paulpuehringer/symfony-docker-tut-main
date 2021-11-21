<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Category;

class LostPageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
            'choices' => [
                '' => 0,
                'Ausweise, Dokumente, Plastikkarten' => 1,
                'Bekleidung' => 2,
                'Brillen, medizinische Geräte, Medikamente' => 3,
                'Elektronik und EDV-Geräte' => 4,
                'Fahrräder, Kinderwägen' => 5,
                'Fahrzeuge, Boote (Fahrzeuge u. Zubehör)' => 6,
                'Geld, Wertpapiere' => 7,
                'Musikinstrument' => 8,
                'Schmuck, Uhren, Wertsachen' => 9,
                'Sonstiges' => 10
            ]])
            ->add('description')
            ->add('location')
            ->add('time')
            ->add('name')
            ->add('addresses')
            ->add('phoneNumber')
            ->add('mailAddress')
            ->add('createdAt')
            ->add('optionalInformation');

    }
}