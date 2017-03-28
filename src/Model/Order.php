<?php
namespace Riesenia\DhlMyApi\Model;

use Salamek\PplMyApi\Model\Order as PplOrder;
use Riesenia\DhlMyApi\Enum\Product;
use Salamek\PplMyApi\Exception\WrongDataException;

class Order extends PplOrder
{
    /**
     * @param $packageProductType
     * @throws WrongDataException
     */
    public function setPackageProductType($packageProductType)
    {
        if (!in_array($packageProductType, Product::$list)) {
            throw new WrongDataException(sprintf('$packProductType has wrong value, only %s are allowed', implode(', ', Product::$list)));
        }

        $this->packageProductType = $packageProductType;
    }
}
