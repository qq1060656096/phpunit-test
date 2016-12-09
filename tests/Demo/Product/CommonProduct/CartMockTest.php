<?php
namespace Smile\PHPUnitTest\Tests\Demo\Proudct\CommonProduct;

use Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Cart;
use Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Product;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

/**
 * 为了使单元测试仿件讲解清晰,所以放在测试方法类,
 * 正确做法是放在基境setUp()或者before注释里面.
 * 开发的时候相同的代码应该放在基境中
 *
 * Class CartTest
 * @package Smile\PHPUnitTest\Tests\Demo\Proudct\CommonProduct
 * @group cart
 * @group cart-commont-cart
 */
class CartMockTest extends SmilePHPUnitCase{

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * 购物车添加产品
     * @group cart-addProduct
     * @group cart-addProduct-normal
     */
    public function testAddProduct(){
        //创建Product桩件
        $productMock  = $this->createMock('Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Product');
        $productMock->method('getPrice')->willReturn(123.46);

        $cart   = new Cart();
        $cart->addProduct($productMock,2);
        $this->assertEquals(2, $cart->getNum());
        $this->assertEquals(2*123.46, $cart->getTotalMoney());
        $this->assertEquals(246.92, $cart->getTotalMoney());
    }

    /**
     * 购物车添加产品数量不是数字字符边界值(实例: 数量=abcd)
     * @group cart-addProduct
     * @group cart-addProduct-exception
     * @expectedException \Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException
     * @expectedExceptionCode 100
     */
    public function testAddProductThrowExceptionWithStringNum(){
        //创建Product桩件
        $productMock  = $this->createMock('Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Product');
        $productMock->method('getPrice')->willReturn(123.45);
        $cart   = new Cart();
        $cart->addProduct($productMock, "abcd");
    }

    /**
     * 购物车添加产品数量等于0边界值(实例: 数量=0)
     * @group cart-addProduct
     * @group cart-addProduct-exception
     * @expectedException Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException
     * @expectedExceptionCode 101
     */
    public function testAddProductThrowExceptionWithZeroNum(){
        echo __METHOD__,"\n";
        //创建Product桩件
        $productMock  = $this->createMock(Product::class);
        $productMock->method('getPrice')->willReturn(678.91);

        $this->assertEquals(678.91,$productMock->getPrice());
        $cart   = new Cart();
        $cart->addProduct($productMock, 0);
    }

    /**
     * 购物车添加产品数量小于0边界值(实例: 数量=-1)
     * @group cart-addProduct
     * @group cart-addProduct-exception
     * @expectedException Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException
     * @expectedExceptionCode 100
     */
    public function testAddProductThrowExceptionWithLessZeroNum(){
        //创建Product桩件
        $productMock  = $this->createMock('Smile\PHPUnitTest\Tests\Base\Product\CommonProduct\Product');
        $productMock->method('getPrice')->willReturn(123.45);
        $cart = new Cart();
        $cart->addProduct($productMock, -1);
    }

}