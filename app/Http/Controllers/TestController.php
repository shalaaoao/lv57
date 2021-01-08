<?php

namespace App\Http\Controllers;

use App\Services\Notices\Weather;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tests()
    {
        $msg = Weather::instance()->tomow();
        dingNotice('zhu')->setTextMessage('『aoao』'.$msg)->setAtMobiles(['18621311906'])->send();
    }
}
