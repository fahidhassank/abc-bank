<?php

namespace App\Helpers;

trait ApiHelper
{
    public function sendResponse($success, $data = [], $message = null, $code = null)
    {
        $code = is_null($code) ? ($success ? 200 : 400) : $code;

        if (is_null($message)) {
            $message  = $success ? "Operation Successfull" : "Something went wrong";
        }

        $response = [
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ];

        return response()->json($response, $code);
    }
}
