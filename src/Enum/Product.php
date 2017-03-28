<?php
namespace Riesenia\DhlMyApi\Enum;

class Product
{
    const DHL_PARCEL_SK = 101;
    const DHL_PARCEL_SK_COD = 102;
    const DHL_PARCEL_INTERNATIONAL = 103;
    const DHL_PARCEL_INTERNATIONAL_COD = 104;
    const DHL_PARCEL_FOR_YOU_SK = 105;
    const DHL_PARCEL_FOR_YOU_SK_COD = 106;
    const DHL_PARCEL_FOR_YOU_INTERNATIONAL = 107;
    const DHL_PARCEL_FOR_YOU_INTERNATIONAL_COD = 108;
    const DHL_PARCEL_IMPORT = 109;
    const DHL_PARCEL_IMPORT_COD = 110;

    /** @var array */
    public static $list = [
        self::DHL_PARCEL_SK,
        self::DHL_PARCEL_SK_COD,
        self::DHL_PARCEL_INTERNATIONAL,
        self::DHL_PARCEL_INTERNATIONAL_COD,
        self::DHL_PARCEL_FOR_YOU_SK,
        self::DHL_PARCEL_FOR_YOU_SK_COD,
        self::DHL_PARCEL_FOR_YOU_INTERNATIONAL,
        self::DHL_PARCEL_FOR_YOU_INTERNATIONAL_COD,
        self::DHL_PARCEL_IMPORT,
        self::DHL_PARCEL_IMPORT_COD
    ];

    public static $cashOnDelivery = [
        self::DHL_PARCEL_SK_COD,
        self::DHL_PARCEL_INTERNATIONAL_COD,
        self::DHL_PARCEL_FOR_YOU_SK_COD,
        self::DHL_PARCEL_FOR_YOU_INTERNATIONAL_COD,
        self::DHL_PARCEL_IMPORT_COD
    ];
}