<?php

namespace App\Traits;

trait Responses
{

    public function success($data, $message): \Illuminate\Http\JsonResponse
    {
        $data = array(
            'success' => true,
            'message' => $message,
            'data' => $data
        );
        $code = 200;

        return response()->json($data, $code);
    }

    public function failed($data, $message): \Illuminate\Http\JsonResponse
    {
        $data = array(
            'success' => false,
            'message' => $message,
            'data' => $data
        );
        $code = 401;

        return response()->json($data, $code);
    }

    public function notfound($data, $message): \Illuminate\Http\JsonResponse
    {
        $data = array(
            'success' => false,
            'message' => $message,
            'data' => $data
        );
        $code = 404;

        return response()->json($data, $code);
    }
}
