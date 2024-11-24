<?php

namespace App;

trait ResponseTrait
{
    public function fail($message = null, $errors = null, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
            'code' => $code,
        ], $code);
    }

    public function success($message = null, $data = [], $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code,
        ], $code);
    }
}
