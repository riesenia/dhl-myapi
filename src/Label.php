<?php
namespace Riesenia\DhlMyApi;

use Salamek\PplMyApi\Label as PplLabel;

class Label extends PplLabel
{
    /** @var boolean */
    protected static $dayNightLabel = false;

    /**
     * @return array
     */
    protected static function parcelContact()
    {
        return [
            'logo' => __DIR__ . '/../assets/logo.png',
            'phone' => '',
            'email' => 'E-mail: infoSK@dhl.com',
            'web' => 'http://www.dhlparcel.sk'
        ];
    }
}
  
