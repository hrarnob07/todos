<?php

namespace App\Http\Controllers\Api\V1\Todos;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodosStoreRequest;
use Illuminate\Http\Request;

class Store extends BaseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TodosStoreRequest $request)
    {
        try{
            $requestData = $request->validated();
            $response['todo'] = $this->repository->store($requestData);
            return responseOk($response);
        }
        catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
