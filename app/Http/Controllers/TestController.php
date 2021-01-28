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
        $a = Star::addStarWithNotice(2, 4);
        dd($a);
    }
}
