<?php

namespace App\Form;

use App\Entity\AssetFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssetFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_person', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nombre de personne'
                ]
            ])
            ->add('accomodationTypeSearch', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type de logement'
                ]
            ])
            ->add('floor', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nombre d\'étage'
                ]
            ])
            ->add('size', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Surface'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AssetFilter::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
