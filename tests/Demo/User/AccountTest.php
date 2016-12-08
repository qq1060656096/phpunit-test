<?php
namespace Smile\PHPUnitTest\Tests\Demo\User;
use Smile\PHPUnitTest\Tests\Base\User\Account;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

/**
 * 用户账户查询测试
 * Class AccountTest
 * @package Smile\PHPUnitTest\Tests\Demo\User
 * @group account
 * @backupGlobals disabled
 */
class AccountTest extends SmilePHPUnitCase{
    protected function setUp(){
        parent::setUp();
    }

    /**
     * 删除testGetByUid()测试记录
     * @group account-delete
     * @group account-getByUid
     */
    public function testDeleteTestGetByUidRecord(){
        $this->conn->delete('account', ['uid' => 1]);
        $this->assertTrue(true);
    }

    /**
     * 创建testGetByUid()测试记录
     *
     * @group account-create
     * @group account-getByUid
     *
     */
    public function testCreateTestGetByUidRecord(){
        $data = [
            'uid'       => 1,
            'money'     => 12345.678,
            'point'     => 3000.567,
            'created'   => '2016-12-07 16:19:03',
            'changed'   => '2016-12-07 16:19:03',
        ];
        $rows = $this->conn->insert('account',$data);
    }

    /**
     * 测试获取用户信息
     * @group account-getByUid
     */
    public function testGetByUid(){
        $uid        = 1;
        $account    = new Account();
        $data       = $account->getByUid($uid);
        $this->assertEquals('1', $data['uid']);
        $this->assertEquals('12345.678', $data['money']);
        $this->assertEquals('2016-12-07 16:19:03', $data['created']);
    }

    /**
     * 删除testCreate()创建的记录
     * @group account-delete
     * @group account-create
     */
    public function testDeleteTestCreateRecord(){
        $this->conn->delete('account', ['uid' => 2]);
    }

    /**
     * 测试创建
     *
     * @group account-create
     *
     */
    public function testCreate(){
        $uid    = 2;
        $account= new Account();
        $lastInsertId   = $account->create($uid);
        $isInsert       = $lastInsertId > 0 ? true : false;
        $this->assertTrue($isInsert, "insert account failed:uid=2");

        $data           = $account->getByUid($uid);
        $createdTimestamp = strtotime($data['created']);
        $this->assertEquals("2", $data['uid']);
        $this->assertTrue(time()>=$createdTimestamp);
    }

    /**
     * @expectedException \Doctrine\DBAL\DBALException
     * @group account-create
     */
    public function testCreateWithStringUid(){
        $uid    = "abcd";
        $account= new Account();
        $lastInsertId   = $account->create($uid);

    }

}