<?php

namespace PressingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('designation')
                ->add('prixUnit', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('nbrePiece', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('definitif');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'PressingBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'pressingbundle_article';
    }

}
