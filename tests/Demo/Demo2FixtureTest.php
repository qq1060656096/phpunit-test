<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

//$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
//include_once($file);

/**
 * 基境
 * 测试类的每个测试方法都会运行一次 setUp() 和 tearDown() 模板方法（同时，
 * 每个测试方法都是在一个全新的测试类实例上运行的）。
 * 另外，setUpBeforeClass() 与 tearDownAfterClass()
 * 模板方法将分别在测试用例类的第一个测试运行之前和测试用例类的最后一个测试运行之后调用
 * @backupGlobals disabled
 */
class Demo2FixtureTest extends \PHPUnit_Framework_TestCase{
    /**
     * 数据提供器
     * @return array
     */
    public function myProvder(){
        return [
            [1],
            [2],
            [3],
        ];
    }

    /**
     *第一个测试运行之前调用setUpBeforeClass()
     */
    public static function setUpBeforeClass(){
        $message = __METHOD__;
        fwrite(STDOUT,"\n\none_start: $message  \n");
    }

    /**
     * 运行某个测试方法调用setUp()
     * 注意如果测试方法使用了数据供给器(dataProvider)就会按照测试方法调用次数
     * 调用
     */
    public function setUp(){
        $message = __METHOD__;
        fwrite(STDOUT,"\n\nstart: $message  \n");
    }
    /**
     * 提供者
     * @dataProvider myProvder
     */
    public function testTestProvider($param1){
        $message = __METHOD__;
        fwrite(STDOUT,"$message $param1 \n");
    }

    public function testDemo(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message  \n");
    }

    /**
     * 测试方法运行结束后，不管是成功还是失败，都会调用tearDown()
     * 注意如果测试方法使用了数据供给器(dataProvider)就会按照测试方法调用次数
     * 调用
     */
    public function tearDown(){
        $message = __METHOD__;
        fwrite(STDOUT,"end:$message  \n\n\n");
    }

    /**
     * 最后一个测试运行之后调用tearDownAfterClass()
     */
    public static function tearDownAfterClass(){
        $message = __METHOD__;
        fwrite(STDOUT,"\none_end:$message  \n\n\n");
    }
}