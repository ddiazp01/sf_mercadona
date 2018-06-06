<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Direccion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DireccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle')
            ->add('numero')
            ->add('extra')
            ->add('indicacion')
            ->add('cliente')
            ->add('cliente',EntityType::class,array(
                'class' => Cliente::class,
                'choice_label' => function ($cliente) {
                    return $cliente->getNombre();
            }))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Direccion::class,
        ]);
    }
}
