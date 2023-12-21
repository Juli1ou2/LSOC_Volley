<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Equipe;
use App\Entity\MatchVolley;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $equipes = $options['equipes'];
        $clubs = $options['clubs'];

        $builder
            ->add('dateMatch', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('idClub', ChoiceType::class, [
                'choices' => $this->formatClubsForChoiceType($clubs),
                'required' => true,
            ])
            ->add('idEquipe1', ChoiceType::class, [
                'choices' => $this->formatEquipesForChoiceType($equipes),
                'required' => true,
            ])
            ->add('idEquipe2', ChoiceType::class, [
                'choices' => $this->formatEquipesForChoiceType($equipes),
                'required' => true,
            ])
            ->add('idEquipeVainqueur', ChoiceType::class, [
                'choices' => $this->formatEquipesForChoiceType($equipes),
                'required' => false,
                'placeholder' => '--',
            ])
            ->add('score', TextType::class, [
                'required' => false,
            ])
            ->add('duree', TextType::class, [
                'required' => false,
                'attr' => [
                    'pattern' => '\d{2}:\d{2}:\d{2}',
                    'placeholder' => 'HH:MM:SS',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MatchVolley::class,
            'equipes' => [],
            'clubs' => [],
        ]);
    }

    private function formatEquipesForChoiceType(array $equipes): array
    {
        $choices = [];
        foreach ($equipes as $equipe) {
            $choices[$equipe->getId()."/ ".$equipe->getLibelle()." - ".$equipe->getClub()->getNom()] = $equipe->getId();
        }

        return $choices;
    }

    private function formatClubsForChoiceType(array $clubs): array
    {
        $choices = [];
        foreach ($clubs as $club) {
            $choices[$club->getNom()." - ".$club->getVille()] = $club->getId();
        }

        return $choices;
    }
}