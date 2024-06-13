<?php

namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typesUtilisateurs',  ChoiceType::class , ['choices'  => [
                    'Particulier' => 'particulier',
                    'Professionnel' => 'professionnel',
                ],
                'label' => false,"placeholder"=>"Vous êtes?",
            ])    
            

            ->add('typeDeBien', ChoiceType::class, ['choices'  => [
                'Appartement - Studio' => 'Appartement - Studio',
                'Appartement - T1' => 'Appartement - T1',
                'Appartement - T2' => 'Appartement - T2',
                'Appartement - T3' => 'Appartement - T3',
                'Appartement - T4' => 'Appartement - T4',
                'Appartement - T5' => 'Appartement - T5',
                'Appartement - T6' => 'Appartement - T6',
                'Appartement - T7' => 'Appartement - T7',
                'Maison - T2' => 'Maison - T2',
                'Maison - T3' => 'Maison - T3',
                'Maison - T4' => 'Maison - T4',
                'Maison - T5' => 'Maison - T5',
                'Maison - T6' => 'Maison - T6',
                'Maison - T7' => 'Maison - T7',
                'Maison - T8' => 'Maison - T8',
                'Maison - T9' => 'Maison - T9',
                'Autres' => 'Autres',
            ],
            'label' => false, "placeholder"=>"Type de bien", 
        ])       
            ->add('bienMeuble', ChoiceType::class, [ 'label' => false, "placeholder"=>"Bien meublé",'choices'  => [ 'Oui' => 'Oui','Non' => 'Non',],  // Afficher comme des cases à cocher au lieu d'une liste déroulante
            'multiple' => false, // Permettre la sélection d'une seule option
            ])
            ->add('codePostal', TextType::class,['label' => false, 'attr' => [ "placeholder"=>"Code postal",]])
            ->add('ville', TextType::class,['label' => false, 'attr' => [ "placeholder"=>"Ville"],])
            ->add('phone', TextType::class,['label' => false, 'attr' => [ "placeholder"=>"Téléphone"],])
            ->add('email', EmailType::class,['label' => false, 'attr' => [ "placeholder"=>"Votre e-mail",]])
            ->add('message', TextType::class,['label' => false, 'attr' => ["placeholder"=>"Message",]])
            // ->add('created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }

}