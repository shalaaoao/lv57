<?php

namespace App\Console\Commands\Fund;

use App\Utils\CurlUtil;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BeforeClose extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fund:before-close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '收市前提醒大盘指数变动';

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
        if (Carbon::now()->isWeekend()) {
            return false;
        }

        $url = 'http://web.juhe.cn:8080/finance/stock/hs?gid=sh000001&key=b70d9e96a6606a7d3b80c4243a394469';
        $res = CurlUtil::get_data_from_url($url);
        $arr = json_decode($res, true);
        $t_data = $arr['result'][0]['data'] ?? [];
        if (!$t_data) {
            dingNotice('zhu')->setTextMessage('『aoao』获取大盘数据失败:'.$res)->setAtMobiles(['13917836275'])->send();
            return false;
        }
        $now = $t_data['nowPri'] ?? 0;
        $yesterday = $t_data['yestodEndPri'] ?? 0;

        $change = round(($now - $yesterday) / $now * 100, 2);
        $msg    = "当前大盘指数{$now},昨日收盘{$yesterday}" . PHP_EOL . "较昨日收盘变动了{$change}%" . PHP_EOL;
        if ($change > 0) {
            $msg .= '大盘上涨，🐷小饱饱注意观望哦~';
        }

        if ($change < 0) {
            $msg .= '大盘下跌，🐷小饱饱注意补仓哟~';
        }

        dingNotice('zhu')->setTextMessage('『aoao』' . $msg)->setAtMobiles(['18621311906'])->send();
    }
}
