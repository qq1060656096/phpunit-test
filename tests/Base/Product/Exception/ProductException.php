<?php
namespace Smile\PHPUnitTest\Tests\Demo\Product\Exeption;

class ProductException extends \Exception{

    /**
     * 产品不存在
     */
    const NOT_EXIST     = 1;
    /**
     * 没有库存
     */
    const NOT_QUANTITY  = 2;
    /**
     * 库存不足
     */
    const LACK_QUANTITY = 3;

    /**
     * 产品类型错误
     */
    const TYPE_ERROR    = 4;

    public function __construct($message, $code, Exception $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}