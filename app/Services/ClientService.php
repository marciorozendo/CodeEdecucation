<?php

namespace CodeEducation\Services;

use CodeEducation\Repositories\ClientRepository;
use CodeEducation\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 20/02/2016
 * Time: 19:16
 */
class ClientService
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientValidator
     */
    private $validator;

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->find($id);
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