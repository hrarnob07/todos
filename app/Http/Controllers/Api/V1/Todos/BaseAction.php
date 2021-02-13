<?php


namespace App\Http\Controllers\Api\V1\Todos;


use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterfaces\TodosRepositoryInterface;

abstract class BaseAction extends Controller
{
    protected $repository;
    public function __construct(TodosRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
