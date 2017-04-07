<?php
namespace Riesenia\DhlMyApi\Model;

use Salamek\PplMyApi\Model\Package as PplPackage;
use Riesenia\DhlMyApi\Enum\Depo;
use Riesenia\DhlMyApi\Enum\Product;
use Salamek\PplMyApi\Exception\WrongDataException;

class Package extends PplPackage
{
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

    /**
     * @param int
     * @return bool
     */
    public function isCashOnDelivery($packageProductType = null)
    {
        if (is_null($packageProductType)) {
            $packageProductType = $this->getPackageProductType();
        }

        return in_array($packageProductType, Product::$cashOnDelivery);
    }
}
