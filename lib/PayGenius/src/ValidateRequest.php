<?php
/*
 * Copyright (c) 2016 Methys Digital
 * All rights reserved.
 *
 * This software is the confidential and proprietary information of Methys Digital.
 * ("Confidential Information"). You shall not disclose such
 * Confidential Information and shall use it only in accordance with
 * the terms of the license agreement you entered into with Methys Digital.
 */

namespace PayGenius;

/**
 * Constructs the validation request.
 */
class ValidateRequest extends AbstractRequest
{
    public $body;

    public function __construct($body = null)
    {
        parent::__construct('util/validate', empty($body) ? 'GET' : 'POST');

        $this->body = $body;
    }

    public function validate()
    {

    }
}