<?php

namespace PressingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReceptionType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('gratuit', TextareaType::class, [
                    'attr' => [
                        'placeholder' => 'Motif de la gratuité!',
                        'required' => false,
                    ]
                ])
                ->add('montantTotal')
                ->add('montantVerse')
                ->add('dateRdv', DateTimeType::class, [
                    'widget' => 'single_text',
                    'invalid_message' => 'La valeur de la date n\'est pas valide',
                    'required' => true,
                    'attr' => [
                    //'data-type' => 'datetime-local',
        ]]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'PressingBundle\Entity\Reception'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'pressingbundle_reception';
    }

}
