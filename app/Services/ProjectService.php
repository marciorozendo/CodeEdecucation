<?php

namespace CodeEducation\Services;


use CodeEducation\Repositories\ProjectRepository;
use CodeEducation\Validators\ProjectValidator;
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
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }
    public function all()
    {
        return $this->repository->all();
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
}