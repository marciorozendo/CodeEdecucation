<?php

namespace CodeEducation\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 21:23
 */

class ClientValidator extends LaravelValidator
{

    protected $rules = [
            'name'          => 'required|max:255',
            'responsible'   => 'required|max:255',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
    ];

}