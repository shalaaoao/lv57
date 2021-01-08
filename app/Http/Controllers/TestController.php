<?php

namespace App\Http\Controllers;

use App\Services\Notices\Weather;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tests()
    {
        echo 'hello world';
    }
}
