<?php
namespace Smile\PHPUnitTest\Tests\Base\Product\CommonProduct;

use Smile\PHPUnitTest\Tests\Base\Product\CartInterface;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\ProductException;
use Smile\PHPUnitTest\Tests\Base\Product\ProductBase;

class Cart implements CartInterface{
    protected $data     = null;
    /**
     * @var Product
     */
    protected $product  = null;
    /**
     * @var int 购买数量
     */
    protected $num      = 0;
    /**
     * @var int 支付总额
     */
    protected $totalMoney = 0;
    /**
     * @var int 实际支付金额
     */
    protected $payMoney = 0;

    /**
     * 增加产品
     * @param Product $product 产品
     * @param integer $num 数量
     * @return boolean
     * @throws CartException 异常
     */
    public function addProduct(ProductBase $product, $num){
        if(!is_numeric($num) || !ctype_digit("$num") ){
            throw new CartException('购买数量不是整数', CartException::NUM_NOT_INTEGER);
        }
        if($num < 1){
            throw new CartException('购买数量必须大于0', CartException::NUM_THAN_ZERO);
        }
        $this->product = $product;
        $this->num     = $num;
        $this->totalMoney = $this->product->getPrice() * $this->num;
        $this->payMoney=$this->totalMoney;
        return true;
    }

    /**
     * 支付总金额
     * @return int
     */
    public function getTotalMoney(){
        return $this->totalMoney;
    }

    /**
     * 实际支付金额
     * @return int
     */
    public function getPayMoney(){
        return $this->payMoney;
    }

    public function getNum(){
        return $this->num;
    }

    /**
     * 结算
     */
    public function settle(){

        if(!$this->product->isCheckType()){
            throw new ProductException('不是普通商品', ProductException::TYPE_ERROR);
        }
        if($this->product->getQuantity() < 1){
            throw new ProductException('没有库存', ProductException::NOT_QUANTITY);
        }
        if($this->product->getQuantity() < $this->num){
            throw new ProductException('库存不足', ProductException::LACK_QUANTITY);
        }
        return true;
    }
}