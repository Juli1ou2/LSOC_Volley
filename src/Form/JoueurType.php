<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Joueur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroLicence')
            ->add('numero')
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('dateNaissance')
            ->add('taille')
            ->add('poste')
            ->add('nationalite')
            ->add('cheminPhoto')
            ->add('genre')
            ->add('equipes', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
