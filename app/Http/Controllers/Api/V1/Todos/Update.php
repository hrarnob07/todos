<?php

namespace App\Http\Controllers\Api\V1\Todos;

use App\Http\Requests\TodosUpdateRequest;

class Update extends BaseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TodosUpdateRequest $request,$id)
    {
        try{
            $requestData = $request->validated();
            $response['todo'] = $this->repository->update($requestData,$id);
            return responseOk($response);
        }
        catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
