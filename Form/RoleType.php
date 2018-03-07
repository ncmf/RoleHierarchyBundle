<?php

namespace NCMF\RoleHierarchyBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('code');
        $builder->add('description');
        $builder->add('enabled', CheckboxType::class, [
            'label' => 'Активность'
        ]);
        if (!$builder->getData()->getId() || $builder->getData()->getLvl() != 0) {
            $data = $builder->getData();
            $builder->add('parent', EntityType::class, [
                'required' => true,
                'class' => 'NCMF\RoleHierarchyBundle\Entity\Role',
                'query_builder' => function (EntityRepository $er) use ($data) {
                    $qb = $er->createQueryBuilder('u');
                    if ($data->getId()) {
                        $qb->where('u.id != :id');
                        $qb->setParameter('id', $data->getId());
                    }
                    $result = $qb->orderBy('u.root, u.lft', 'ASC');
                    return $result;
                },
                'choice_label' => 'indentName',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NCMF\RoleHierarchyBundle\Entity\Role'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ncmf_rolehierarchybundle_role';
    }


}
