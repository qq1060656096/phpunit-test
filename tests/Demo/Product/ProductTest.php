<?php
namespace Smile\PHPUnitTest\Tests\Base\Product;
use Smile\PHPUnitTest\Tests\Base\Base;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

/**
 * Class ProductTest
 * @package Smile\PHPUnitTest\Tests\Demo\Product
 * @group product
 * @proup product-base
 * @backupGlobals disabled
 */
class ProductTest extends SmilePHPUnitCase{
    /**
     * 创建产品id
     * @var int
     */
    protected $create_insert_id = 0;

    /**
     * @group product-getById
     * @group product-create
     * @group product-delete
     */
    public function testDeleteCreateRecord(){
        $this->conn->delete('product',['name'=>'测试产品2016-12-08 17:05']);
    }

    /**
     * @group product-getById
     * @group product-create
     */
    public function testCreate(){
        $product        = new ProductBase();
        $lastInsertId   = $product->create(
            '测试产品2016-12-08 17:05',
            123.45 , 456.78, 1,20,15
        );
        $operation = $lastInsertId > 0 ? true:false;
        $this->assertTrue($operation, "创建产品失败");
        $sql    = "select * from product where pid=?";
        $data   = $this->conn->fetchAssoc($sql, [$lastInsertId]);

        $this->assertEquals($lastInsertId, $data['pid']);
        $this->assertEquals("测试产品2016-12-08 17:05", $data['name']);
        $this->assertEquals("123.45", $data['price']);
        $this->assertEquals("456.78", $data['point']);
        return $lastInsertId;
    }

    /**
     * @depends testCreate
     * @group product-getById
     */
    public function testGetById($lastInsertId){
        $product    = new ProductBase();
        $data       = $product->getById($lastInsertId);
        $this->assertEquals($lastInsertId, $data['pid']);
        $this->assertEquals("测试产品2016-12-08 17:05", $data['name']);
        $this->assertEquals("123.45", $data['price']);
        $this->assertEquals("456.78", $data['point']);

        //创建产品直接获取产品信息
        $product    = new ProductBase($lastInsertId);
        $this->assertEquals("123.45", $product->getPrice());
        $this->assertEquals("456.78", $product->getPoint());
        $this->assertEquals("5", ''.$product->getQuantity());
    }

    /**
     * 非法字符串查询
     * @group product-getById
     */
    public function testGetByIdWithStringProductId(){
        $product    = new ProductBase();
        $data       = $product->getById('abcd');
        $this->assertFalse($data);
    }


}