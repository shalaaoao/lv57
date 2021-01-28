<?php

namespace App\Services\Notices;

class BaseNotice
{
    protected static function toZhu(string $msg)
    {
        dingNotice('zhu')->setTextMessage('『aoao』'.$msg)->setAtMobiles(['18621311906'])->send();
    }
}
