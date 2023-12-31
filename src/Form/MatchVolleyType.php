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
                'choice_label' => 'id',
            ])
            ->add('equipes', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'id',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MatchVolley::class,
        ]);
    }
}
