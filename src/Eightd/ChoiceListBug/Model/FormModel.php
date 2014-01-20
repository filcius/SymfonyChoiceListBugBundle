<?php
/*
 * Copyright 2014 8D Technologies, Inc. All Rights Reserved.
 *
 * This software is the proprietary information of 8D Technologies, Inc.
 * Use is subject to license terms.
 */

namespace Eightd\ChoiceListBug\Model;


class FormModel {

    const ATTRIBUTE_CHOICE = 'choice';
    /**
     * @var mixed
     */
    private $choice;

    /**
     * @var mixed[]
     */
    private $availableChoices = array();

    function __construct($availableChoices) {
        $this->availableChoices = $availableChoices;
    }

    public function setChoice($choice) {
        $this->choice = $choice;
    }

    public function getChoice() {
        return $this->choice;
    }

    public function getAvailableChoices() {
        return $this->availableChoices;
    }

} 