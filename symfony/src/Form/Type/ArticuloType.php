<?php

namespace App\Form\Type;

use App\Entity\Articulo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticuloType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('numero', NumberType::class)
      ->add('descripcion', TextType::class)
      ->add('ubicacion', TextType::class);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Articulo::class,
    ]);
  }

  public function getName()
  {
    return '';
  }
}
