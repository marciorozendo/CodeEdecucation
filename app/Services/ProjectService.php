<?php

namespace CodeEducation\Services;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use CodeEducation\Validators\ProjectValidator;
use CodeEducation\Repositories\ProjectRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Prettus\Validator\Exceptions\ValidatorException;



/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 19:16
 */
class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;
    /**
     * @var \CodeEducation\Services\Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;

    /**
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }
    public function all()
    {

        return $this->repository->findWhere(['owner_id' => Authorizer::getResourceOwnerId()]);
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {

            return ['error' => true, 'message' => $e->getMessageBag()];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return ['error' => true, 'message' => $e->getMessageBag()];
        }
    }

    public function delete($id)
    {
        try{

            return $this->repository->find($id)->delete();
        }catch (ValidatorException $e)
        {
            return [
                'error' => true,
                'messaga' => $e->getMessageBag()
            ];
        }
    }

    public function isOwner($projectId,$userId)
    {

        if(count($this->repository->findWhere(['id' => $projectId, 'owner_id' => $userId]))){
            return true;
        }
        return false;
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->repository->find($projectId);

        foreach($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }
        return false;
    }

    public function createFile($all)
    {

        $project = $this->repository->skipPresenter()->find($all['project_id']);

        $projectFile = $project->files()->create([
            'name' => $all['name'],
            'extension' => $all['file']->getClientOriginalExtension(),
            'project_id' => $all['project_id'],
            'description' => $all['description']
        ]);
        $extension = $all['file']->getClientOriginalExtension();
        $this->storage->put($projectFile->id. "." . $extension, $this->filesystem->get($all['file']));
    }

}