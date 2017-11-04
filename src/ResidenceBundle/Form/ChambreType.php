<?php

namespace ResidenceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ChambreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('etat',choiceType::class, array(
                'label'    => 'Etat',
                'choices' => array(
                    'disponible' => 'disponible',
                    'occupée'=> 'occupée'),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('appartement',EntityType::class,array(
                'class'=>'ResidenceBundle\Entity\Appartement',
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('responsable',EntityType::class,array(
                'class'=>'ResidenceBundle\Entity\Responsable',
                'choice_label'=>'telephone',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('valider',submitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResidenceBundle\Entity\Chambre'
        ));
    }
}
