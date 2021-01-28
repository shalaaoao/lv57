<?php

namespace App\Services\Notices;

use App\Http\Model\StarLog;

class Star extends BaseNotice
{
    public static function addStarWithNotice(int $star_num, int $star_type)
    {
        $add = StarLog::addData($star_num, $star_type);
        if (!$add->id) {
            return;
        }

        $star_type_text = StarLog::STAR_TYPE_TEXT[$star_type] ?? '';
        if (!$star_type_text) {
            return;
        }

        $msg = '🐷饱饱触发每日奖励：'.PHP_EOL.'『' . $star_type_text . '』';
        if ($add->star_num == 0) {
            return;
        }

        if ($add->star_num > 0) {
            $msg .= '新增';
        }
        if ($add->star_num < 0) {
            $msg .= '减少';
        }

        $msg .= $add->star_num . '颗✨✨' . PHP_EOL. PHP_EOL;
        $msg .= "详情请阅读：http://julyaoao.top/star/lists";

        self::toZhu($msg);
    }

}
