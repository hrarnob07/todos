<?php

namespace App\Http\Controllers\Api\V1\Todos;

use Illuminate\Http\Request;

class Active extends BaseAction
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
            $response['todos'] = $this->repository->active();
            return responseOk($response);

        }catch (\Throwable $throwable){
            return responseCantProcess($throwable);
        }
    }
}
