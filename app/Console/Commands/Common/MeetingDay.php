<?php

namespace App\Console\Commands\Common;

use Carbon\Carbon;
use Illuminate\Console\Command;

class MeetingDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'common:meeting-day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '推送纪念日';

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
        $meeting_day = strtotime(20190504);
        $meeting_dis = floor((time() - $meeting_day) / 86400);

        $love_day = strtotime(20190520);
        $love_dis = floor((time() - $love_day) / 86400);

        $msg = "biubiubiu~".PHP_EOL."今天是我和宝宝相识的第{$meeting_dis}天💗".PHP_EOL."💕💕💕💕💕💕💕💕💕💕💕".PHP_EOL."和宝宝相恋的第{$love_dis}天👦💗👧".PHP_EOL;
        dingNotice('zhu')->setTextMessage('『aoao』' . $msg)->setAtMobiles(['18621311906'])->send();
    }
}
