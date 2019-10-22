<?php

namespace App\Form;

use App\Entity\UserSearch;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\StringType;
//use Doctrine\DBAL\Types\TextType;
use phpDocumentor\Reflection\Types\Float_;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' =>'nom'
                ]
            ])
            ->add('note', IntegerType::class, [
                'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'note'
                    ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' =>UserSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}
