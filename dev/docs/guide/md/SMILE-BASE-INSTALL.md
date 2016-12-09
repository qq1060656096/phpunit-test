安装(Install)
=========================

<small>1步 通过Composer安装</small>
-------------------------
> 通过 Composer 安装
如果还没有安装 Composer，你可以按 [getcomposer.org](https://getcomposer.org/) 中的方法安装


<small>2步 创建composer写入内容</small>
-------------------------
> 创建composer.json文件,并写入以下内容

```php
{
	"repositories": [
        {
            "type": "vcs",
            "url": "https://git.coding.net/qq1060656096/phpunit-test.git"
        }
    ],
	"require-dev": {
		"smile/phpunit-test": "dev-master"
    }
}	
```


<small>3步 安装</small>
-------------------------
```php
composer install
```

<small>4步 在tests\Base\DB.php配置数据库信息</small>
------------------------


<small>5步 导入dev/sql目录下的sql文件到数据库</small>
------------------------

<small>6步 tests目录下执行phpunit单元测试命令</small>
------------------------


