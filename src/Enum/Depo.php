<?php
namespace Riesenia\DhlMyApi\Enum;

class Depo
{
    const HQ_BRATISLAVA = '50';
    const BRATISLAVA = '51';
    const ZILINA = '52';
    const BANSKA_BYSTRICA = '53';
    const KOSICE = '54';
    const HUB_BRATISLAVA = '59';
    const HUB_ZILINA = '58';

    /** @var array */
    public static $list = [
        self::HQ_BRATISLAVA,
        self::BRATISLAVA,
        self::ZILINA,
        self::BANSKA_BYSTRICA,
        self::KOSICE,
        self::HUB_BRATISLAVA,
        self::HUB_ZILINA
    ];
}