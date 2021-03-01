<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use NSQClient\Access\Endpoint;
use NSQClient\Message\Message;
use NSQClient\Queue;
use phpspider\core\phpspider;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $topic = 'my_topic';
        $endpoint = new Endpoint('http://127.0.0.1:4161');
        $message = new Message('hello world');
        $result = Queue::publish($endpoint, $topic, $message);

        dd($result);
    }
}
