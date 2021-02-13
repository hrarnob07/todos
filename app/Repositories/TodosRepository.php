<?php


namespace App\Repositories;


use App\Models\Todo;
use App\Repositories\RepositoryInterfaces\TodosRepositoryInterface;

class TodosRepository extends BaseRepository implements TodosRepositoryInterface
{
        public function __construct(Todo $model)
        {
            parent::__construct($model);
        }


    function createOrUpdateIfNotExitDelete($data)
    {
        try{
            $todos = [];

            foreach ($data as $index => $item)
            {
                
                $this->model->updateOrCreate(['title'=>$item['title']]);
                $todos []=$item['title'];
                
            }
           
            $this->model->whereNotIn('title',$todos)->delete();
            
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

    }

    function clearCompleted()
    {
        try{
            
           return  $this->model
                ->where('status','=',false)
                ->delete();    
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    function active()
    {
        try{
           return $this->model
                ->where('status','=',true)
                ->get();   
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    function completed()
    {
        try{
           return  $this->model
                ->where('status','=',false)
                ->get();   
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
