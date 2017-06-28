<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

//$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
//include_once($file);

/**
 *
 * 测试demo Class DemoTest
 * @package Smile\PHPUnitTest\Tests\Demo
 */
class Demo0Test extends SmilePHPUnitCase
{
    /**
     * 单个测试
     */
    public function test1(){
        $this->assertTrue(true);
    }
    /**
     * 断言测试
     */
    public function testDemo(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        $this->assertTrue(true);
    }

    /**
     * 跳过测试
     */
    public function testSkip(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");

        $this->markTestSkipped(
            'MySQLi 扩展不可用。'
        );
    }

    /**
     * 未完成的测试
     */
    public function testIncomplete(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        // 在这里停止，并将此测试标记为未完成。
        $this->markTestIncomplete(
            '此测试目前尚未实现。'
        );
    }

    /**
     * 测试依赖之前
     */
    public function testDepends0(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        return true;
    }

    /**
     * 依赖测试
     * @depends testDepends0
     */
    public function testDepends1($testDepends0_return){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        $this->assertTrue($testDepends0_return);
    }
    /**
     * 异常测试
     * @expectedException \Exception
     */
    public function testException(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        throw new \Exception('测试');
    }

    /**
     * 异常错误码测试
     * @expectedException \Exception
     * @expectedExceptionCode 200
     */
    public function testExceptionCode200(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        throw new \Exception('测试',200);
    }

    /**
     * 异常消息测试
     * @expectedException \Exception
     * @expectedExceptionMessage  测试
     */
    public function testExceptionMessage(){
        $message = __METHOD__;
        fwrite(STDOUT,"$message \n");
        throw new \Exception('测试',200);
    }

}