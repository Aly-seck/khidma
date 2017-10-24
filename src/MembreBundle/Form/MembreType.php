<?php

namespace MembreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('numCNI')
            ->add('addresse')
            ->add('dateNaissance', 'date')
            ->add('lieuNaissance')
            ->add('telephone')
            ->add('sexe')
            ->add('numInscription')
            ->add('photo')
            ->add('anciennete')
            ->add('fonction')
            ->add('observation')
            ->add('statut')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MembreBundle\Entity\Membre'
        ));
    }
}
