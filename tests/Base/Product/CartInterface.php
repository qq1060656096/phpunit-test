<?php
namespace Smile\PHPUnitTest\Tests\Base\Product;



interface CartInterface{
    /**、
     * 购物车添加产品
     * @param ProductBase $product 产品对象
     * @param integer $num 数量
     * @return mixed
     */
    public function addProduct(ProductBase $product, $num);

    /**
     * 购物车结算
     * @return boolean
     */
    public function settle();

    /**
     * 支付总金额
     * @return int
     */
    public function getTotalMoney();

    /**
     * 实际支付金额
     * @return int
     */
    public function getPayMoney();

    /**
     * 数量
     * @return int
     */
    public function getNum();


}