<?php

namespace App\Http\Controllers\Api;

trait ResponseTrait
{
    public function apiResponse($data = null , $message = null, $status = null)
    {
        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status,

        ];
        return response($array,$status);
    }

    // public function errorResponse($message = 'Error', $statusCode = 400)
    // {
    //     return response()->json([
    //         'message' => $message,
    //         'status' => $statusCode,
    //     ], $statusCode);
    // }
}
