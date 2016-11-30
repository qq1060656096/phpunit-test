<?php
namespace Smile\PHPUnitTest\Tests\Demo;
use Smile\PHPUnitTest\Tests\SmilePHPUnitCase;

$file = dirname(__DIR__).'/SmilePHPUnitCase.php';
include_once($file);

/**
 *
 * 测试demo Class DemoTest
 * @package Smile\PHPUnitTest\Tests\Demo
 */
class DemoTest extends SmilePHPUnitCase
{
    public function testDemo(){
        $this->assertTrue(true);
    }
}