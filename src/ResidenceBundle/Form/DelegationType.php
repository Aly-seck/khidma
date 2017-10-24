<?php

namespace ResidenceBundle\Form;

use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

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
            ->add('email')
            ->add('type')
            ->add('nombrePersonne')
            ->add('lieu')
            ->add('dateArrive', DateType::class)
            ->add('dateRetour', DateType::class)
            ->add('addresse')
            ->add('chambre')
            ->add('accueillant')
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
