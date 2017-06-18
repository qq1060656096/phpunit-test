<?php
namespace Smile\PHPUnitTest\Tests\Demo;

use Smile\PHPUnitTest\Tests\Base\User\Account;
use Smile\PHPUnitTest\Tests\Base\User\User;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;
use Smile\PHPUnitTest\Tests\Base\DB as DB2;

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
class Demo3Stubs1Test extends \PHPUnit_Framework_TestCase{

    /**
     * 基镜共享
     */
    public static function setUpBeforeClass(){

        $connect = DB2::getInstance();
        $connect->delete('users', ['phone' => '20170618185901']);
        $connect->delete('users', ['phone' => '20170618185902']);
    }

    /**
     * 测试用户注册打桩
     */
    public function testUserRegisterStubs()
    {
        // Account类我们已经测试过了,我们不需重复去测试Account类中的方法
        // 这时我们要打桩
        //Account类建立仿件对象，只模仿 create() 方法。
        $accountMock = $this->getMockBuilder(Account::class)
            ->setMethods(['create'])
            ->getMock();
        // create()可以调用多次,并且返回值为"1"。
        $accountMock->expects($this->any())
            ->method('create')
            ->willReturn(1);
        $this->assertEquals('1', $accountMock->create(100));

        //现在我们注册,只会在user表中插入记录,不会再account表中插入记录
        $user = new User();
        $uid = $user->register('20170618185901', '123', $accountMock);
        $bool = $uid > 0 ? true : false;
        $this->assertTrue($bool);
    }
}

