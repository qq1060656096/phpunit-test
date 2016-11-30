<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
include_once($file);

class SomeClass
{
    public function doSomething()
    {
        // 随便做点什么。
    }

}

class SomeClassHasMethod
{
    public function doSomething()
    {
        // 随便做点什么。
    }
    public function method(){

    }
}


/**
 * 桩件、替身测试
 * 有时候对被测系统(SUT)进行测试是很困难的，因为它依赖于其他无法在测试环境中使用的组件。
 * 这有可能是因为这些组件不可用，它们不会返回测试所需要的结果，或者执行它们会有不良副作用。
 * 在其他情况下，我们的测试策略要求对被测系统的内部行为有更多控制或更多可见性。
 * 如果在编写测试时无法使用（或选择不使用）实际的依赖组件(DOC)，
 * 可以用测试替身来代替。测试替身不需要和真正的依赖组件有完全一样的的行为方式；
 * 他只需要提供和真正的组件同样的 API 即可，这样被测系统就会以为它是真正的组件！
 * @backupGlobals disabled
 */
class Demo2Stubs extends \PHPUnit_Framework_TestCase{
    /**
     * 桩测试
     * SomeClass类不包含method方法
     */
    public function testSomeClass()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);
        // 配置桩件。
        $stub->method('doSomething')
            ->willReturn('foo');
        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('foo', $stub->doSomething());
        $message = __METHOD__;
        fwrite(STDOUT," $message  \n");
    }

    /**
     * 桩异常测试
     * @expectedException \Exception
     */
    public function testThrowExceptionStub()
    {
        $message = __METHOD__;
        fwrite(STDOUT," $message  \n");

        // 为 SomeClass 类创建桩件
        $stub = $this->createMock(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->throwException(new \Exception));

        // $stub->doSomething() 抛出异常
        $stub->doSomething();

    }

    /**
     * 桩returnArgument()测试
     *
     */
    public function testSomeClassReturnArgument1Stub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);
        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnArgument(1));
        // $stub->doSomething('foo') 返回 'foo'
        $this->assertTrue( $stub->doSomething('0',true));

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnArgument(1));
        // $stub->doSomething('foo') 返回 'foo'
        $this->assertEquals('foo', $stub->doSomething('00','foo'));
        $message = __METHOD__;
        fwrite(STDOUT," $message  \n\n");
    }

    /**
     * 桩测试
     * SomeClassHasMethod包含method方法指定使用以下方式调用
     */
    public function testSomeClass2(){
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClassHasMethod::class);
        $stub->expects($this->any())->method('doSomething')->willReturn(true);
        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertTrue( $stub->doSomething());
    }
}