<?php

namespace App\Form;

use App\Entity\FindingsCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvents;

class FoundPageForm extends AbstractType
{
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function buildForm(FormBuilderInterface $builder, array $options, FindingsCategory $findingsCategory = null)
    {
//        $findingsCategory= $this->em
//            ->getRepository(FindingsCategory::class)
//            ->find(1);


        $builder
//            ->add('Kategorien', EntityType::class, array (
//                    'required' => true,
//                    'data' => $findingsCategory,
//                    'placeholder' => 'Wähle eine Kategorie...',
//                    'class' => 'App:FindingsCategory'
//            ))
        ->add('Kategorien', ChoiceType::class, [
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
            ->add('Beschreibung')
            ->add('Ort')
            ->add('Zeit')
            ->add('Name')
            ->add('Adresse')
            ->add('Telefonnummer')
            ->add('EmailAdresse')
            ->add('sonstigeInformationen');
    }
}