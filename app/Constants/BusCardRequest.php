<?php

namespace App\Constants;

class BusCardRequest
{
    const TYPE_NORMAL = 1;
    const TYPE_ALL = 2;

    const INTERLINE_BUS_TYPE = [
        self::TYPE_NORMAL => 'Liên tuyến bình thường (không đi tuyến 54)',
        self::TYPE_ALL => 'Liên tuyến và tuyến 54 (tất cả các tuyến)',
    ];
}