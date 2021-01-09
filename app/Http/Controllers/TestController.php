<?php

namespace App\Http\Controllers;

use App\Services\Notices\Weather;
use App\Utils\CurlUtil;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tests()
    {
        $url = 'http://web.juhe.cn:8080/finance/stock/hs?gid=sh000001&key=b70d9e96a6606a7d3b80c4243a394469';
        $res = CurlUtil::get_data_from_url($url);
        $arr = json_decode($res, true);
        dd($arr);
    }
}
