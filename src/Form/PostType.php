<?php

namespace App\Form;

use App\Entity\Post;
use App\Form\TagsInputType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('text', null, ['required' => false])
            ->add('tags', TagsInputType::class, [
                'label' => 'タグ',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, ['attr' => ['class' => 'btn btn-primary'], 'label' => '保存'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
