<?php 


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->add('q', TextType::class, [
            'attr' => [
                'placeholder' => 'Recherche via un mot clé...'
            ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}