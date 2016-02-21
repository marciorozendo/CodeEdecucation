<?php

namespace CodeEducation\Services;


use CodeEducation\Repositories\ProjectNoteRepository;
use CodeEducation\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 19:16
 */
class ProjectNoteService
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var ProjectNoteValidator
     */
    private $validator;

    /**
     * @param ProjectNoteRepository $repository
     */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function show($id,$noteId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }
    public function all($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
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