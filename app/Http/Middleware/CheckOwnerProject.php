<?php

namespace CodeEducation\Http\Middleware;

use Closure;
use CodeEducation\Services\ProjectService;
use Authorizer;

class CheckOwnerProject
{
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectService $service
     */
    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $userId = Authorizer::getResourceOwnerId();
        $project_id = $request->project;

        if($this->service->isOwner($project_id,$userId) == false){
            return response(['error'=> 'falha de Authorizer']);

        }
        return $next($request);
    }
}
