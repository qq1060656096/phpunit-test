<?php
namespace Smile\PHPUnitTest\Tests\Base;

class Base{
    /**
     * 数据库连接
     * @var \Doctrine\DBAL\Connections\MasterSlaveConnection
     */
    public $db_connection = null;

    public function __construct()
    {
        $this->db_connection = DB::getInstance();
    }
}