<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

//$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
//include_once($file);


/**
 * 测试可以用 @group 标注来标记为属于一个或多个组
 * @backupGlobals disabled
 * @group demo_group_class
 */
class Demo4Group1Test extends \PHPUnit_Framework_TestCase{
    /**
     * @group demo_group_method_2
     */
    public function testGroup0(){
        $message = __METHOD__;
        fwrite(STDOUT," $message  \n");
        $this->assertTrue(true);
    }

    /**
     * @group demo_group_method_3
     */
    public function testGroup1(){
        $message = __METHOD__;
        fwrite(STDOUT," $message  \n");
        $this->assertTrue(true);
    }
}
