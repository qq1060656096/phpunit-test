<?php
namespace Smile\PHPUnitTest\Tests\Base;
use Doctrine\DBAL\DriverManager;
/**
 * 数据库操作类
 * Class DB
 */
class DB {
    /**
     * 数据库链接
     * @var \Doctrine\DBAL\Connections\MasterSlaveConnection
     */
    private $dbConnection = null;
    /**
     * 构造方法private防止外部实例化
     */
    private function __construct(){
        $conn = DriverManager::getConnection(
            array(
                'wrapperClass' => 'Doctrine\DBAL\Connections\MasterSlaveConnection',
                'driver' => 'pdo_mysql',
                'master' => array('user' => 'root', 'password' => 'root', 'host' => 'localhost', 'dbname' => 'phpunit-test'),
                'slaves' => array(
                    array('user' => 'root', 'password'=>'root', 'host' => 'localhost', 'dbname' => 'phpunit-test'),
                    array('user' => 'root', 'password'=>'root', 'host' => 'localhost', 'dbname' => 'phpunit-test'),
                ),
                'keepSlave'=>true,//注意保持从数据库连接
            )
        );
        $this->dbConnection = $conn;
    }
    /**
     * 防止clone
     */
    private function __clone(){}
    /**
     * 获取DB实例
     * @return \Doctrine\DBAL\Connections\MasterSlaveConnection
     */
    public static function getInstance(){
        static $db = null;
        if(!$db){
            $db = new DB();
        }
        return $db->dbConnection;
    }
}