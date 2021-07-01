<?php

namespace App\Console\Commands\Design;

use Illuminate\Console\Command;

class Factory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'design:factory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '设计模式-工厂模式';

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
        $type = 2;

//        switch ($type) {
//            case 1:
//                $obj = new A();
//                break;
//            case 2:
//                $obj = new B();
//                break;
//            case 3:
//                throw new \Exception('aaaa');
//                break;
//        }
        $factory = 'y';
        if ($factory == 'x') {
            $obj = new FactoryX();
        } else {
            $obj = new FactoryY();
        }

        dd($obj->createObj($type)->lists());
    }
}



class FactoryX{

    private $obj;

    public function createObj($type)
    {
        if ($type == 1) {
            return new A();
        }

        return new B();
    }
}

class FactoryY{

    public function createObj($type)
    {
        if ($type == 1) {
            return new B();
        }

        return new C();
    }
}

class A {
    public function __construct()
    {

    }

    public function lists()
    {
        return 'A';
    }
}

class B {
    public function __construct()
    {

    }

    public function lists()
    {
        return 'B';
    }
}

class C {
    public function __construct()
    {

    }

    public function lists()
    {
        return 'C';
    }
}
