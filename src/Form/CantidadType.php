<?php

namespace App\Form;

use App\Entity\Pedido;
use App\Entity\Producto;
use App\Entity\Cantidad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CantidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            
            ->add('pedido',EntityType::class,array(
                'class' => Pedido::class,
                'choice_label' => function ($pedido) {
                    return $pedido->getId();
            }))
            ->add('producto',EntityType::class,array(
                'class' => Producto::class,
                'choice_label' => function ($producto) {
                    return $producto->getNombre();
            }))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cantidad::class,
        ]);
    }
}
