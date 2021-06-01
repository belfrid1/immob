<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\Proprietaire;
use App\Repository\ProprietaireRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('surface')
            ->add('piece')
            ->add('proprietaire', null, [
                'required' => true
            ])
            ->add('ville', null, [
                'required' => true
            ])
            ->add('etat', null, [
                'required' => true
            ])
            ->add('tranche', null, [
                'required' => true
            ])
            ->add('type_bien', null, [
                'required' => true
            ])
            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
