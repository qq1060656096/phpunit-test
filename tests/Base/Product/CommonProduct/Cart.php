<?php
namespace Smile\PHPUnitTest\Tests\Base\Product\CommonProduct;

use Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Product;
use Smile\PHPUnitTest\Tests\Base\Product\Exeption\CartException;
use Smile\PHPUnitTest\Tests\Base\Product\Exeption\ProductException;

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
     */
    public function addProduct(Product $product, $num){
        if(!is_numeric($num)){
            throw new CartException('购买数量不是整数', CartException::NUM_NOT_INTEGER);
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

    /**
     * 结算
     */
    public function settle(){

        if(!$this->product->isCheckType()){
            throw new ProductException(ProductException::TYPE_ERROR);//不是普通商品
        }
        if($this->product->getQuantity() < 1){
            throw new ProductException(ProductException::NOT_QUANTITY);//没有库存
        }
        if($this->product->getQuantity() < $this->num){
            throw new ProductException(ProductException::LACK_QUANTITY);//库存不足
        }

    }
}