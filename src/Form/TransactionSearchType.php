<?php

namespace App\Form;

use App\Entity\CardBrand;
use App\Entity\Acquirer;
use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TransactionSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('merchant', TextType::class, array())
            ->add('startDate', DateTimeType::class, array('widget' => 'single_text'))
            ->add('endDate', DateTimeType::class, array('widget' => 'single_text'))
            ->add('cardBrand', EntityType::class, array(
                'multiple'=> true,
                'class'   => CardBrand::class
                ))
            ->add('acquirer', EntityType::class, array(
                'multiple'=> true,
                'class'   => Acquirer::class
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
            'csrf_protection' => false,
        ]);
    }
}
