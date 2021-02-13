<?php


namespace App\Repositories\RepositoryInterfaces;


interface TodosRepositoryInterface extends BaseRepositoryInterface
{
    function createOrUpdateIfNotExitDelete($data);
    function clearCompleted();
    function active();
    function completed();

}
