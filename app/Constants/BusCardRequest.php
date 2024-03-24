<?php

namespace App\Constants;

class BusCardRequest
{
    const TYPE_NO_INTERLINE = 1;
    const TYPE_NORMAL = 2;
    const TYPE_ALL = 3;

    const INTERLINE_BUS_TYPE = [
        self::TYPE_NO_INTERLINE => 'Một tuyến',
        self::TYPE_NORMAL => 'Liên tuyến bình thường (không đi tuyến 54)',
        self::TYPE_ALL => 'Liên tuyến và tuyến 54 (tất cả các tuyến)',
    ];
}