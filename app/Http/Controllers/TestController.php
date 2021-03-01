<?php

namespace App\Http\Controllers;

use App\Http\Model\StarLog;
use App\Services\Notices\Star;
use App\Services\Notices\Weather;
use App\Utils\CurlUtil;
use Illuminate\Http\Request;
use NSQClient\Access\Endpoint;
use NSQClient\Queue;
use NsqClient\Message\Message;

class TestController extends Controller
{
    public function tests()
    {
        $topic = 'my_topic';
        $endpoint = new Endpoint('http://127.0.0.1:4161');
        $message = new Message('hello world');
        $result = Queue::publish($endpoint, $topic, $message);

        dd($result);
    }
}
