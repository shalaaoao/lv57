<?php

namespace App\Console\Commands\Design;

use Illuminate\Console\Command;

class Strategy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'design:strategy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '设计模式：策略模式';

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

    }
}

interface StrategyInterface {
    public function st();
}

class StrategyA implements StrategyInterface {
    public function st()
    {

    }
}

class StrategyB implements StrategyInterface {
    public function st()
    {

    }
}
