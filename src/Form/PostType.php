<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('textContent',TextareaType::class,[
                'attr'=>['placeholder'=>'post something awesome'],
                'label'=>false,
            ])
//            ->add('image', FileType::class, [
//                'mapped' => false,
//                'required' => false,
//                'label'=>'image',
//                'constraints' => [
//                    new File([
//                        'maxSize' => '1024k',
//                        'mimeTypes' => [
//                            'image/bmp',
//                            'image/jpeg',
//                            'image/png',
//                            'image/gif'
//                        ],
//                        'mimeTypesMessage' => 'Please upload a valid image',
//                    ])
//                ],
//            ])
            ->add('postedOn',ChoiceType::class,[
                'label'=>false,
                'expanded'=>true,
                'multiple'=>true,
                'choices'=>$options['postedOn'],
                'choice_label' => function ($choice, $key, $value) {
                    return sprintf('<img src="%s" alt="%s" class="form-choice-pictures"/>', $key, $key);
                },
            ])
            ->add('post',SubmitType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            'postedOn'=>[],
        ]);
    }
}
