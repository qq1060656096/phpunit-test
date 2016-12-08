<?php
namespace Smile\PHPUnitTest\Tests\Base\User;

use Smile\PHPUnitTest\Tests\Base\Base;



/**
 * Class Account
 * @package Smile\PHPUnitTest\Tests\Demo\User
 */
class Account extends Base{
    private $_data = null;

    /**
     * Account constructor.
     * @param null| $uid
     */
    public function __construct($uid = null)
    {
        parent::__construct();
        if($uid === null){
            $this->_data = $this->getByUid($uid);
        }
    }

    /**
     * create user account
     * @param integer $uid user id
     * @return integer last insert id
     */
    public function create($uid){
        $data = [
            'uid'       => $uid,
            'money'     => 0,
            'point'     => 0,
            'created'   => date('Y-m-d H:i:s'),
            'changed'   => date('Y-m-d H:i:s'),
        ];
        $result         = $this->db_connection->insert('account', $data);
        $lastInsertId   = $this->db_connection->lastInsertId();
        return $result ? $lastInsertId : 0;
    }


    /**
     * use uid get account
     * @param integer $uid user uid
     * @return array key value array
     */
    public function getByUid($uid){
        $sql    = "select * from account where uid=?";
        $data   = $this->db_connection->fetchAssoc($sql,[$uid]);
        return $data;
    }


    /**
     * get account data
     * @return array|null key value array
     */
    public function getData(){
        return $this->_data;
    }

    public function getByUids($uids){
        $uids ? $uids : $uids=[];
        $uids       = array_unique($uids);
        $joinUids   = implode(',', $uids);
        if(empty($joinUids)){
            return null;
        }

        $sql    = "select * from account where uid in (?)";
        $data   = $this->db_connection->fetchAssoc($sql,[$joinUids]);
        return $data;
    }
}