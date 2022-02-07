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
        $a = CardEnum::getPackCards();
        $res = array_chunk($a, count($a)/ 4);
       dd($res);
        dd($a);
        die;
        $previousCards = [3,4,5,6,7];
        $currentCards = [5,5,5,5];
        $res = (new BaseCardServices())->setPreviousCards($previousCards)->compareCard($currentCards);
dd($res);
        die;


        $ver = function ($cards) {
            $cardsValueCount = array_count_values($cards);
            $cardsN          = max($cardsValueCount);

            // N必须>=3
            if ($cardsN < 3) {
                return;
            }

            // L
            $cardsL = collect($cardsValueCount)->filter(function ($item) use ($cardsN) {
                return $item == $cardsN;
            })->count();

            // 判断M、N的数量是否都为L
            $cardsMCount = collect($cardsValueCount)->filter(function ($item) use ($cardsN) {
                return $item < $cardsN;
            })->count();
            $cardsMSum   = collect($cardsValueCount)->filter(function ($item) use ($cardsN) {
                return $item < $cardsN;
            })->sum();

            if ($cardsL != $cardsMCount && $cardsL != $cardsMSum) {
                return;
            }

            // 判断M是否连续
            $cardsMList = collect($cardsValueCount)->filter(function ($item) use ($cardsN) {
                return $item == $cardsN;
            })->keys()->toArray();

            foreach ($cardsMList as $k => $cardNo) {
                // 前后数字不连贯 - 错
                if (isset($cardsMList[$k + 1]) && $cardNo != $cardsMList[$k + 1] - 1) {
                    return;
                }
            }

            return true;
        };

//        $lists = [
//            [3, 3, 3, 1],
//            [3, 3, 3, 1, 1],
//            [5, 5, 5, 6, 6, 6, 1, 1],
//            [5, 5, 5, 6, 6, 6, 1, 2],
//            [5, 5, 5, 6, 6, 6, 1, 1, 2, 2],
//        ];

        $lists = [
//            [3, 1],
//            [3,3,3,1,2],
//            [3,3,3,5,5,5,1,2],
            [3,3,3,4,4,4,1,1,2,5]
        ];

        foreach ($lists as $cards) {
            $ver($cards) ?: dump(json_encode($cards));
        }

        dump('success');

        die;
        $cards = [3, 4, 5, 6, 8];

        $a = new CardRulesVerifyServices($cards);
        dump($a->checkCardType());
    }
}
