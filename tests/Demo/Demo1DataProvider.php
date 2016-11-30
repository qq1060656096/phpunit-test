<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
include_once($file);

class Cart{
    protected $user = null;
    public function __construct()
    {
    }
}

/**
 *
 * 测试demo Class DemoTest
 * @package Smile\PHPUnitTest\Tests\Demo
 */
class Demo1DataProvider extends SmilePHPUnitCase
{
    /**
     * 数据提供者
     */
    public function myDataProvider(){
        $data = [
            ['arg1'=>1,'arg2'=>'1test arg2'],
            ['arg1'=>2,'arg2'=>'2test arg2'],
            ['arg1'=>3,'arg2'=>'3test arg2'],
            ['arg1'=>4,'arg2'=>'4test arg2'],
            ['arg1'=>5,'arg2'=>'5test arg2'],
        ];
        return $data;
    }

    /**
     * 测试数据提供者
     * @dataProvider myDataProvider
     */
    public function testMyDataProvider($arg1, $arg2){
        $message = __METHOD__;
        fwrite(STDOUT," $message \$arg1=$arg1 ::: \$arg2=$arg2 \n\n");
    }
}