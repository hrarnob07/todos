<?php

if(!function_exists('responseOk')){
    function responseOk($data = null, $message = "request processed successfully"){
        $response = [
            'success'=> true,
            'message' => $message
        ];

        if($data){
            $response["data"] = $data;
        }
        return response()->json($response ,200);
    }
}

if(!function_exists('responseCreated')){
    function responseCreated($data = null, $message = "request created successfully"){
        $response = [
            'success'=> true,
            'message' => $message
        ];

        if($data){
            $response["data"] = $data;
        }
        return response()->json($response ,200);
    }
}

if(!function_exists('responsePatched')){
    function responsePatched($data = null, $message = "request patched successfully"){
        $response = [
            'success'=> true,
            'message' => $message
        ];

        if($data){
            $response["data"] = $data;
        }
        return response()->json($response ,200);
    }
}

if(!function_exists('responseDeleted')){
    function responseDeleted( $message = "request deleted successfully"){
        $response = [
            'success'=> true,
            'message' => $message
        ];

        return response()->json($response ,200);
    }
}

if(!function_exists('responseCantProcess')){
    function responseCantProcess( \Throwable $exception = null){
        $message = (config('app.debug') && $exception) ? $exception->getMessage().'.Location : '.$exception->getFile().'at line :'.$exception->getLine() : "cannot process request";
        $response = [
            'success'=> false ,
            'message' => $message
        ];

        return response()->json($response ,400);
    }
}

if(!function_exists('responseCantProcess')){
    function responseCantProcess( \Throwable $exception = null){
        $message = (config('app.debug') && $exception) ? $exception->getMessage().'.Location : '.$exception->getFile().'at line :'.$exception->getLine() : "cannot process request";
        $response = [
            'success'=> false ,
            'message' => $message
        ];

        return response()->json($response ,400);
    }
}

if(!function_exists('responseUnauthorized')){
    function responseUnauthorized( ){
        $response = [
            'success'=> false ,
            'message' => 'Unauthorized'
        ];

        return response()->json($response ,401);
    }
}
if(!function_exists('responseContactAdmin')){
    function responseContactAdmin($message ){
        $response = [
            'success'=> false ,
            'message' => $message
        ];

        return response()->json($response ,400);
    }
}
