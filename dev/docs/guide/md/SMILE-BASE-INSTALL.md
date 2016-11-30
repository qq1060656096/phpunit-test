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
            "url": "https://github.com/qq1060656096/php-base.git"
        }
    ],
	"require-dev": {
		"smile/data-dictionary": "dev-develop"
    }
}	
```


<small>3步 安装</small>
-------------------------
```php
composer install
```

