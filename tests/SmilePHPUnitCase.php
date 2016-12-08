<?php
namespace Smile\PHPUnitTest\Tests;

//$vender = dirname(__DIR__);
//require_once $vender . '/vendor/autoload.php';
use Smile\PHPUnitTest\Tests\Base\DB;

/**
 * Class SmilePHPUnitCase
 * @package Smile\PHPUnitTest\Tests
 */
abstract class SmilePHPUnitCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Doctrine\DBAL\Connections\MasterSlaveConnection
     */
    protected $conn = null;
    protected function setUp()
    {
        $this->conn = DB::getInstance();
    }
}
