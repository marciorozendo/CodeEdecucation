<?php

namespace CodeEducation\Http\Controllers;

use CodeEducation\Services\ProjectService;
use Illuminate\Http\Request;



class ProjectController extends Controller{

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
    public function __construct(ProjectService $service,Request $request)
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
        return $this->service->show($id);

    }
    public function update($id)
    {

        return $this->service->update($this->request->all(),$id);
    }

    public function destroy($id)
    {
        $this->service->delete($id);

    }

}
