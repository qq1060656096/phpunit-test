<?php
namespace Smile\PHPUnitTest\Tests\Demo\Product;
interface CartInterface{
    /**、
     * 购物车添加产品
     * @param Product $product 产品对象
     * @param integer $num 数量
     * @return mixed
     */
    public function addProdct(Product $product, $num);

    /**
     * 购物车结算
     * @return boolean
     */
    public function settile();
}