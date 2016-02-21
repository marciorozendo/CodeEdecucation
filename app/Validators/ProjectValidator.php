<?php

namespace CodeEducation\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 21:23
 */

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
            'owner_id'      => 'required|integer',
            'client_id'     => 'required|integer',
            'name'          => 'required',
            'progress'      => 'required',
            'status'        => 'required',
            'due_date'      => 'required',
    ];

}