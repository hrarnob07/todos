<?php

namespace App\Http\Controllers\Api\V1\Todos;

use Illuminate\Http\Request;
class ClearCompleted extends BaseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request  $request)
    {
        try{ 
            $this->repository->clearCompleted();
           
            return responseOk();
        }
        catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
