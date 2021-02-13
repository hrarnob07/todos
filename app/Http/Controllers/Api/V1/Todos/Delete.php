<?php

namespace App\Http\Controllers\Api\V1\Todos;


class Delete extends BaseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        try{ 
            $this->repository->delete($id);
            return responseOk();
        }
        catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
