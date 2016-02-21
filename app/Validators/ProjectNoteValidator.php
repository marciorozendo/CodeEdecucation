<?php

namespace CodeEducation\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 21:23
 */

class ProjectNoteValidator extends LaravelValidator
{

    protected $rules = [
            'project_id'      => 'required|integer',
            'title'     => 'required|integer',
            'note'          => 'required'
    ];

}