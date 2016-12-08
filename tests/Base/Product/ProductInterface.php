<?php
namespace Smile\PHPUnitTest\Tests\Demo\Product;
interface ProductInterface{
    /**
     * 获取商品价格
     * @return float 价格
     */
    public function getPrice();

    /**
     * 获取商品数量
     * @return integer 数量
     */
    public function getQuntity();
}