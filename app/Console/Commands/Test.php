<?php

namespace App\Console\Commands;

use App\Enum\CardEnum;
use App\Services\Card\BaseCardServices;
use App\Services\Card\CardRulesVerifyServices;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Swoole\Runtime;
use Swoole\Coroutine;
use function Swoole\Coroutine\run;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test1';


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
        $arr = [1,2,3,4,5];

        array_splice($arr, 1, 1);

        dd($arr);
    }
}
