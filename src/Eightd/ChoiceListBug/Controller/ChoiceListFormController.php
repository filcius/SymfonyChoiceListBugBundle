<?php
/*
 * Copyright 2014 8D Technologies, Inc. All Rights Reserved.
 *
 * This software is the proprietary information of 8D Technologies, Inc.
 * Use is subject to license terms.
 */

namespace Eightd\ChoiceListBug\Controller;

use Eightd\ChoiceListBug\Form\Type\FormModelType;
use Eightd\ChoiceListBug\Model\FormModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ChoiceListFormController extends Controller {


    /**
     * @Template()
     */
    function formAction() {
        $formModel = $this->getRequest()->getSession()->get('$formModel', null);
        if (!$formModel) {
            $choices = array();
            $choices[1] = 'choice 1';
            $choices[2] = 'choice 2';

            $formModel = new FormModel($choices);
            $this->getRequest()->getSession()->set('$formModel', $formModel);
        }

        $form = $this->createForm(new FormModelType($formModel->getAvailableChoices()), $formModel);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
        }

        return array(
            'formModel' => $formModel,
            'form' => $form->createView()
        );
    }
} 