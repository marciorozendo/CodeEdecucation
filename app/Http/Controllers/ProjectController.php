<?php

namespace CodeEducation\Http\Controllers;

use CodeEducation\Services\ProjectService;
use Illuminate\Http\Request;
use Authorizer;


class ProjectController extends Controller
{

    /**
     * @var Request
     */
    private $request;
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ClientService $service
     * @param Request $request
     * @internal param $repository
     */
    public function __construct(ProjectService $service, Request $request)
    {
        $this->request = $request;
        $this->service = $service;
    }


    public function index()
    {
        return $this->service->all();
    }

    public function store()
    {

        return $this->service->create($this->request->all());
    }

    public function show($id)
    {

        if(!$this->checkProjectMember($id)){
            return ['error' => 'Access Forbidden'];
        }

        return $this->service->show($id);
    }

    public function update($id)
    {

        return $this->service->update($this->request->all(), $id);
    }

    public function destroy($id)
    {
        if(!$this->service->isOwner($id,Authorizer::getResourceOwnerId())){
            return ['error' => 'Access Forbidden'];
        }

        $this->service->delete($id);

    }

    public function checkProjectMember($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();

        if($this->service->isOwner($projectId,$userId) or $this->service->hasMember($projectId,$userId)){
            return true;
        }
        return false;
    }

}
