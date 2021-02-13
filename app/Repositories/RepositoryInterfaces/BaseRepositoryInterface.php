<?php


namespace App\Repositories\RepositoryInterfaces;


interface BaseRepositoryInterface
{
     function all($orderBy="created_at",$order= "desc");
     function paginate($perPage= 15, $orderBy="created_at",$order= "desc");
     function store(array $data);
     function storeAll(array $data);
     function update(array $data, $id);
     function updateByUser($id, array $data, $userId);
     function delete($id);
     function deleteByUser($id,$userId);
     function find($id);
     function findByUser($id,$userId);
     function deleteNotExit($fieldName,$data);

}
