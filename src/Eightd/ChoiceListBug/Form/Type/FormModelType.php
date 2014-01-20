<?php
/*
 * Copyright 2014 8D Technologies, Inc. All Rights Reserved.
 *
 * This software is the proprietary information of 8D Technologies, Inc.
 * Use is subject to license terms.
 */

namespace Eightd\ChoiceListBug\Form\Type;


use Eightd\ChoiceListBug\Model\FormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormModelType extends AbstractType {

    /**
     * @var array
     */
    private $availableChoices;

    function __construct($availableChoices) {
        $this->availableChoices = $availableChoices;
    }


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add(FormModel::ATTRIBUTE_CHOICE, 'choice',
            array('choices' => $this->availableChoices,
                'expanded' => true,
                'required' => false));
        $builder->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class' => get_class(new FormModel(array()))
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName() {
        return 'formModel';
    }
}