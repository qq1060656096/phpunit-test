<?php
namespace Smile\PHPUnitTest\Tests\Base\Product;

use Smile\PHPUnitTest\Tests\Base\Base;
use Smile\PHPUnitTest\Tests\Demo\Product\Exeption\ProductException;

class ProductBase extends Base{
    protected $_data = null;
    public function __construct($product_id=null)
    {
        parent::__construct();
        if($product_id!==null){
            $this->_data = $this->getById($product_id);
            if(!$this->_data){
                throw new \ProductException('未找到',ProductException::NOT_EXIST);
            }
        }
    }

    public function getById($id){
        $sql = "select * from product where pid=?";
        return $this->db_connection->fetchAssoc($sql, [$id]);
    }
    /**
     * 获取商品单价
     * @return float 单价
     */
    public function getPrice(){
        return $this->_data['price'];
    }
    /**
     * 获取商品使用积分
     * @return float 积分
     */
    public function getPoint(){
        return $this->_data['point'];
    }
    /**
     * 获取商品库存数量
     * @return integer 数量
     */
    public function getQuantity(){
        return $this->_data['quantity'] - $this->_data['sale_quantity'];
    }

    /**
     * 创建产品
     * @param string $name 名称
     * @param float $price 单价
     * @param float $point 积分
     * @param integer $type 类型
     * @return integer
     */
    public function create($name, $price , $point, $type, $quantity=0, $sale_quantity=0){
        $data = [
            'name' => $name,
            'price'=> $price,
            'point'=> $point,
            'type' => $type,
            'shop_id' => 0,
            'quantity'=> $quantity,
            'sale_quantity' => $sale_quantity,
            'created' => date('Y-m-d H:i:s'),
            'changed' => date('Y-m-d H:i:s'),
        ];
        $result = $this->db_connection->insert('product', $data);
        return $result ? $this->db_connection->lastInsertId():0;
    }

    /**
     * 检查商品类型
     * @param integer $type
     * @return bool
     */
    public function isCheckType($type){
        return $this->_data['type']==$type ? true : false;
    }
}