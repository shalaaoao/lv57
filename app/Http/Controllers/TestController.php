<?php

namespace App\Http\Controllers;

use App\Http\Model\StarLog;
use App\Services\Notices\Star;
use App\Services\Notices\Weather;
use App\Utils\CurlUtil;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tests()
    {
        dd(route('star.add'));
    }
}
