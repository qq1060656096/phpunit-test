<?php
namespace Smile\PHPUnitTest\Tests\Base\Product\Exception;

class CartException extends \Exception{
    /**
     * 购买数量不是整数
     */
    const NUM_NOT_INTEGER   = 100;
    /**
     * 购买数量必须大于0
     */
    const NUM_THAN_ZERO     = 101;
}