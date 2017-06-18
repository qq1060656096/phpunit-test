<?php
namespace Smile\PHPUnitTest\Tests;

date_default_timezone_set('PRC'); //设置中国时区

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}
else {
    throw new \Exception('Can\'t find autoload.php. Did you install dependencies via composer?');
}