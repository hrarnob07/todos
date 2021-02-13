<?php


namespace App\Repositories;


use App\Repositories\RepositoryInterfaces\BaseRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    function all($orderBy = "created_at", $order = "desc")
    {
        return $this->model->orderBy($orderBy ,$order)->get();
    }

    function paginate($perPage = 15, $orderBy = "created_at", $order = "desc")
    {
        return $this->model->orderBy($orderBy ,$order)->paginate($perPage);
    }

    function store(array $data)
    {
        return $this->model->create($data);
    }
    function storeAll(array $data)
    {
        return $this->model->insert($data);
    }

    function update(array $data, $id)
    {
        $result = $this->model->find($id);
        if(empty($result)){
            throw  new NotFoundHttpException("Not result found!");
        }
        $result->update($data);
        return $this->find($id);
    }

    function updateByUser($id, array $data, $userId)
    {
        // TODO: Implement updateByUser() method.
    }

    function delete($id)
    {
        $result = $this->model->find($id);
        if(empty($result)){
            throw  new NotFoundHttpException("Not result found!");
        }
        return $result->delete();
    }

    function deleteByUser($id, $userId)
    {
        // TODO: Implement deleteByUser() method.
    }

    function find($id)
    {
       $result = $this->model->find($id);
       if(empty($result)){
           throw  new NotFoundHttpException("Not result found!");
       }
       return $result;
    }

    function findByUser($id, $userId)
    {
        // TODO: Implement findByUser() method.
    }

    function deleteNotExit($fieldName,$data)
    {
        return $this->model->whereNotIn($fieldName,$data)->delete();
    }
}
