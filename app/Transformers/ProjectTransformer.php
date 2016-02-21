<?php
/**
 * Created by PhpStorm.
 * User: Marcio;
 * Date: 21/02/2016
 * Time: 14:28
 */

namespace CodeEducation\Transformers;

use CodeEducation\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['members'];

    public function transform(Project $project)
    {

        return [
            'Codigo' => $project->id,
            'Projeto' => $project->name,
            'Descricao' => $project->description,
            'Progresso' => $project->progress,
            'Situacao' => $project->status,
            'Data' => $project->due_date
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

}