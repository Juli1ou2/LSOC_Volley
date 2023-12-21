<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Equipe;
use App\Entity\MatchVolley;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchVolleyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idEquipe_vainqueur')
            ->add('idEquipe_perdant')
            ->add('score')
            ->add('duree')
            ->add('dateMatch')
            ->add('club', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'nom',
            ])
            ->add('equipe1', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => function (Equipe $equipe) {
                    // Utilisez ici les attributs de la classe Equipe pour personnaliser le label
                    return sprintf('%s %s - %s', $equipe->getId(), $equipe->getClub()->getNom(), $equipe->getLibelle());
                },
                'multiple' => false,
                'label' => 'Équipe 1',
            ])
            ->add('equipe2', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => function (Equipe $equipe) {
                    // Utilisez ici les attributs de la classe Equipe pour personnaliser le label
                    return sprintf('%s %s - %s', $equipe->getId(), $equipe->getClub()->getNom(), $equipe->getLibelle());
                },
                'multiple' => false,
                'label' => 'Équipe 2',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MatchVolley::class,
        ]);
    }
}
