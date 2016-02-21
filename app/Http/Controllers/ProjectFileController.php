<?php

namespace CodeEducation\Http\Controllers;


use CodeEducation\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProjectFileController extends Controller
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
     * @param Request $request
     * @param ProjectService $service
     * @internal param $repository
     */
    public function __construct(Request $request, ProjectService $service)
    {
        $this->request = $request;
        $this->service = $service;
    }


    public function store()
    {
        $this->service->createFile($this->request->all());
    }
}