<?php

namespace CodeEducation\Http\Controllers;

use CodeEducation\Services\ProjectNoteService;
use Illuminate\Http\Request;



class ProjectNoteController extends Controller{

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
    public function __construct(ProjectNoteService $service,Request $request)
    {
        $this->request = $request;
        $this->service = $service;
    }


    public function index($id)
    {

        return $this->service->all($id);

    }

    public function store()
    {
        return $this->service->create($this->request->all());

    }

    public function show($id,$noteId)
    {
        return $this->service->show($id,$noteId);

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
