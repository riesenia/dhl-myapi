<?php
namespace Riesenia\DhlMyApi\Model;

use Salamek\PplMyApi\Model\Package as PplPackage;
use Riesenia\DhlMyApi\Enum\Depo;
use Riesenia\DhlMyApi\Enum\Product;
use Salamek\PplMyApi\Exception\WrongDataException;

class Package extends PplPackage
{
    /**
     * Package constructor
     *
     * @param null|integer $seriesNumberId
     * @param int $packageProductType
     * @param float $weight
     * @param string $note
     * @param string $depoCode
     * @param Sender $sender
     * @param Recipient $recipient
     * @param null|SpecialDelivery $specialDelivery
     * @param null|PaymentInfo $paymentInfo
     * @param ExternalNumber[] $externalNumbers
     * @param PackageService[] $packageServices
     * @param Flag[] $flags
     * @param null|PalletInfo $palletInfo
     * @param null|WeightedPackageInfo $weightedPackageInfo
     * @param integer $packageCount
     * @param integer $packagePosition
     * @throws WrongDataException
     */
    public function __construct(
        $seriesNumberId,
        $packageProductType,
        $weight,
        $note,
        $depoCode,
        Sender $sender,
        Recipient $recipient,
        SpecialDelivery $specialDelivery = null,
        PaymentInfo $paymentInfo = null,
        array $externalNumbers = [],
        array $packageServices = [],
        array $flags = [],
        PalletInfo $palletInfo = null,
        WeightedPackageInfo $weightedPackageInfo = null,
        $packageCount = 1,
        $packagePosition = 1
    ) {
        if (in_array($packageProductType, Product::$cashOnDelivery) && is_null($paymentInfo)) {
            throw new WrongDataException('$paymentInfo must be set if product type is CoD');
        }

        $this->setPackageProductType($packageProductType);
        $this->setWeight($weight);
        $this->setNote($note);
        $this->setDepoCode($depoCode);
        $this->setSender($sender);
        $this->setRecipient($recipient);
        $this->setSpecialDelivery($specialDelivery);
        $this->setPaymentInfo($paymentInfo);
        $this->setExternalNumbers($externalNumbers);
        $this->setPackageServices($packageServices);
        $this->setFlags($flags);
        $this->setPalletInfo($palletInfo);
        $this->setWeightedPackageInfo($weightedPackageInfo);
        $this->setPackageCount($packageCount);
        $this->setPackagePosition($packagePosition);


        if (!is_null($seriesNumberId)) {
            $this->setSeriesNumberId($seriesNumberId);
        }
    }

    /**
     * @param $seriesNumberId
     * @throws WrongDataException
     */
    public function setSeriesNumberId($seriesNumberId)
    {
        if (!is_numeric($seriesNumberId)) {
            throw new WrongDataException('$seriesNumberId has wrong format');
        }

        $this->seriesNumberId = $seriesNumberId;
        $this->setPackageNumber($seriesNumberId);
    }

    /**
     * @param $packageProductType
     * @throws WrongDataException
     */
    public function setPackageProductType($packageProductType)
    {
        if (!in_array($packageProductType, Product::$list)) {
            throw new WrongDataException(sprintf('$packageProductType has wrong value, only %s are allowed', implode(', ', Product::$list)));
        }

        $this->packageProductType = $packageProductType;
    }

    /**
     * @param string $depoCode
     * @throws WrongDataException
     */
    public function setDepoCode($depoCode)
    {
        if (!in_array($depoCode, Depo::$list)) {
            throw new WrongDataException(sprintf('$depoCode has wrong value, only %s are allowed', implode(', ', Depo::$list)));
        }

        $this->depoCode = $depoCode;
    }
}
