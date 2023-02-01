<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * @param $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseError ($message, $data = []) {
        return response()->json([
            'status' => 400,
            'message' => $message,
            'data' => (array) $data
        ]);
    }

    /**
     * @param $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseSuccess ($message, $data = []) {
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => (array) $data
        ]);
    }
}
