<?php
namespace Smile\PHPUnitTest\Tests\Demo\User;

use Smile\PHPUnitTest\Tests\Base\DB as DB2;
use Smile\PHPUnitTest\Tests\Base\User\Account;
use Smile\PHPUnitTest\Tests\Base\User\User;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

/**
 * 替身测试
 * 部分模拟测试:http://stackoverflow.com/questions/5795591/mock-a-method-in-the-same-class-being-tested
 * 部分模拟测试: 调用一个方法内部调用其他方法,可以只模拟其他方法调用
 * 实例: User类register()注册方法会调用本类中的generatePassword()方法,
 * generatePassword()方法已经测试过了,我只需要模拟generatePassword()就可以了
 * Class UserSubsMockBuilderTest
 * @package Smile\PHPUnitTest\Tests\Demo\User
 * @group user-subs-mock
 * @backupGlobals disabled
 */
class UserPartMockBuilderTest extends SmilePHPUnitCase{
    /**
     * 基镜共享
     */
    public static function setUpBeforeClass(){

        $connect = DB2::getInstance();
        $connect->delete('users', ['phone' => '20161215011']);
        $connect->delete('users', ['phone' => '20161215012']);
    }

    public function testPartMockRegisterCallOnceGeneratePassword(){
        //类建立仿件对象，只模仿 generatePassword() 方法。
        $userMock = $this->getMockBuilder('\Smile\PHPUnitTest\Tests\Base\User\User')
            ->setMethods(['generatePassword'])
            ->getMock();
        //建立预期状况：generatePassword() 方法将会被调用一次，
        // 并且将以字符串 '10470c3b4b1fed12c3baac014be15fac67c6e815' 返回值。
        $userMock->expects($this->once())
            ->method('generatePassword')
            ->willReturn('10470c3b4b1fed12c3baac014be15fac67c6e815');
        $uid    = $userMock->register('20161215011','123456');
        $this->assertTrue($uid>0);

        $sql    = "select * from users where phone='20161215011'";
        $result = $this->conn->fetchAssoc($sql);
        $this->assertEquals("$uid", $result['uid']);
        $this->assertEquals("20161215011", $result['phone']);
        $this->assertEquals("10470c3b4b1fed12c3baac014be15fac67c6e815", $result['pass']);

        //这里会报错,因为调用了多次
        $result = $userMock->generatePassword('fff');
        $this->assertEquals('123456', $result);
    }

    /**
     * 部分模拟测试
     *
     */
    public function testPartMockRegisterCallAnyGeneratePassword(){



        //类建立仿件对象，只模仿 generatePassword() 方法。
        $userMock = $this->getMockBuilder('\Smile\PHPUnitTest\Tests\Base\User\User')
                        ->setMethods(['generatePassword'])
                        ->getMock();
        //建立预期状况：generatePassword() 方法将会被调用若多次，
        // 并且将以字符串 '123456' 返回值。
        $userMock->expects($this->any())
                ->method('generatePassword')
                ->willReturn('123456');
        $uid = $userMock->register('20161215012','123456');
        $this->assertTrue($uid>0);


        $sql    = "select * from users where phone='20161215012'";
        $result = $this->conn->fetchAssoc($sql);
        $this->assertEquals("$uid", $result['uid']);
        $this->assertEquals("20161215012", $result['phone']);
        $this->assertEquals("123456", $result['pass']);
        $result = $userMock->generatePassword('fff');
        $this->assertEquals('123456', $result);
    }


}