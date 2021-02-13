<?php

namespace App\Http\Controllers\Api\V1\Todos;

class Completed extends BaseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        try
        {
            $response['todos'] = $this->repository->completed();
            return responseOk($response);

        }catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
