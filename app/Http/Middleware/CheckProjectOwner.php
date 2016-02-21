<?php

namespace CodeEducation\Http\Middleware;

use Authorizer;
use Closure;

use CodeEducation\Services\ProjectService;

class CheckProjectOwner
{
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectService $service
     */
    public function __construct(ProjectService $service){
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

//        dd($this->service->isOwner($project_id,$userId));
        if(!$this->service->isOwner($project_id,$userId)){
            return false;
        }


        return $next($request);
    }
}
