<?php

use Illuminate\Http\JsonResponse;

if (! function_exists('walletBalance')) {
    

    function success_response($data,$message = '', $code = 200):JsonResponse
    {   $res = [
        'success' => true,
        'data' => $data,
        
        ];
        if($message !== '') $res['message'] = $message;

        return response()->json($res,$code);
    }

    function validation_error($errors, $code = 422):JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $errors,
        ],$code);
    }

    function error_response($message = '', int $code = 400):JsonResponse
    {
        $res = [
            'success' => false,
        ];
        if($message !== '') $res['message'] = $message;

        return response()->json($res,$code);
    }
}


