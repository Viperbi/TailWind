<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', TextType::class,[
            'label' => 'Prénom'
        ],[
            'attr' =>[
                'placeholder' => 'Saisir le prénom'   
            ]
        ])
        ->add('lastname', TextType::class,[
            'label' => 'Nom de famille'
        ],[
            'attr' =>[
                'placeholder' => 'Saisir le nom de famille'   
            ]
        ])
        ->add('email', EmailType::class,[
            'label' => 'Email'
        ],[
            'attr' =>[
                'placeholder' => "Saisir l'email'"   
            ]
        ])
        ->add('password', RepeatedType::class,[
            "type"=> TextType::class,
            "first_option"=>[
                "label" => "Password",
                'hash_property_path'=>'password'
            ],
            "second_option"=>[
                'label'=> 'Repeat Password'
            ],
            'mapped' => false,
        ],[
            'attr' =>[
                'placeholder' => 'Saisir le prénom'   
            ]
        ])
            ->add('save', SubmitType::class)[
                'label'
            ]
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
