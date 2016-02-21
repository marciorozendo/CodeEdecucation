<?php
/**
 * Created by PhpStorm.
 * User: Marcio;
 * Date: 21/02/2016
 * Time: 14:28
 */

namespace CodeEducation\Transformers;

use CodeEducation\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'Nome' => $user->name
        ];
    }

}