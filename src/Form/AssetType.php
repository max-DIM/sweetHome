<?php

namespace App\Form;

use App\Entity\Asset;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Descript')
            ->add('dailyRate')
            ->add('nbPerson')
            ->add('size')
            ->add('floor')
            ->add('accomodationType')
            ->add('state')
            ->add('street')
            ->add('zipCode')
            ->add('gps')
//            ->add('actor')
            ->add('conditionAsset')
            ->add('availabilityCalendar')
            ->add('equipments')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Asset::class,
        ]);
    }
}
