<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @return JsonResponse
     */
    protected function success($data = [])
    {
        if (!isset($data['errmsg'])) {
            $data['errmsg'] = 'ok';
        }

        $data['errcode'] = 0;

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE)
                         ->header('Content-Type', 'application/json;charset=utf-8');
    }

    /**
     * @param $code
     * @param $msg
     * @param array $data
     * @return JsonResponse
     */
    protected function fail($code, $msg, array $data = [])
    {
        $returnData = array(
            'errcode' => $code,
            'errmsg'  => $msg,
        );
        $returnData = array_merge($data, $returnData);
        return response()->json($returnData)->header('Content-Type', 'application/json;charset=utf-8');
    }
}
