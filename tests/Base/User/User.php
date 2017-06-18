<?php
namespace Smile\PHPUnitTest\Tests\Base\User;

use Smile\PHPUnitTest\Tests\Base\Base;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\AccountException;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\CartException;
use Smile\PHPUnitTest\Tests\Base\Product\Exception\UserException;

class User extends Base {
    /**
     * 用户注册
     * @param string $phone 手机号码
     * @param string $pass 密码
     * @param Account $account
     * @return int|string
     * @throws AccountException
     * @throws UserException
     */
    public function register($phone,$pass, Account $account){
        $data = [
            'phone' => $phone,
            'pass'  => $this->generatePassword($pass)
        ];
        $result = $this->db_connection->insert('users',$data);
        $uid    = $result ? $this->db_connection->lastInsertId():0;
        if($uid<1){
            throw new UserException(UserException::USER_CREATE_FAIL,'用户创建失败');
        }

        if(!$account->create($uid)){
            throw new AccountException(AccountException::ACCOUNT_CREATE_FAIL,'账户创建失败');
        }
        return $uid;
    }

    /**
     * 生成加密密码
     * @param stirng $pass 密码
     * @return string
     */
    public function generatePassword($pass){
        return $pass = sha1(md5($pass));
    }
}