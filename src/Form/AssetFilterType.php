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
                'require' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nombre de personnes'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AssetFilter::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}
