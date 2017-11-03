<?php

namespace ResidenceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

class DelegationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('chef')
            ->add('telephone')
            ->add('email',EmailType::class, array(
                'required'    => true,
                'constraints' => new Assert\Email(['checkMX' => true]),
                  ))
            ->add('type')
            ->add('nombrePersonne')
            ->add('lieu')
            ->add('dateArrive', dateTimeType::class,array(
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
            ))
            ->add('dateRetour', dateTimeType::class,array(
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
            ))
            ->add('addresse')
            ->add('chambre',EntityType::class,array(
                'class'=>'ResidenceBundle\Entity\Chambre',
                'choice_label'=>'numero',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('accueillant',EntityType::class,array(
                'class'=>'ResidenceBundle\Entity\Accueillant',
                'choice_label'=>'telephone',
                'expanded'=>false,
                'multiple'=>false
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResidenceBundle\Entity\Delegation'
        ));
    }
}
