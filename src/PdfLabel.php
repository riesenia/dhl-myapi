<?php
namespace Riesenia\DhlMyApi;

use Salamek\PplMyApi\PdfLabel as PplPdfLabel;

class PdfLabel extends PplPdfLabel
{
    const SENDER = 'Odosielateľ:';
    const RECEIVER = 'Príjemca:';

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
