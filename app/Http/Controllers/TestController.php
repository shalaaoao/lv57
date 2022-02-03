<?php

namespace App\Http\Controllers;

use App\Http\Model\StarLog;
use App\Services\Notices\Star;
use App\Services\Notices\Weather;
use App\Utils\CurlUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Swoole\Runtime;
use function Swoole\Coroutine\run;

class TestController extends Controller
{
    public function tests()
    {
        Runtime::enableCoroutine(SWOOLE_HOOK_ALL);
return 1;
//        echo "hello world" . PHP_EOL;

        $a = [];
        for ($i = 0; $i < 100; $i++) {
            run(function ($i) {
                Log::info("aaa:".$i);
//            $a[] = $i;
            });
        }
    }
}

