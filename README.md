# phpunit-test
-----
how to write good unit testing
如何写好单元测试

## 如何写好单元测试[查看文档](./docs/README.md)
---
### 1. 为什么要写单元测试?[查看文档](./docs/WHY-WRITE-UNIT-TESTING.md)
### 2. 单元测试与集成测试的区别?[查看文档](./docs/UNIT-AND-INTEGRATION-TESTING.md)
### 3. 先写代码还是先写单元测试?[查看文档](./docs/FIRST-WRITE-CODE-OR-WRITE-UNIT-TESTING.md)
### 4. 谁来编写什么样的测试?[查看文档](./docs/WHO-IS-WRITE-UNIT-TESTING.md)
### 5. 如何避免无用的测试?[查看文档](./docs/AVOID-USELESS-UNIT-TESTING.md)

* 5.1 只写必要的测试
* 5.2 只写关键的测试
* 5.3 无用的测试

### 6. 测试代码覆盖率[查看文档](./docs/TEST-CODE-COVERAGE.md)
### 7. 单元测试中的"伪装术"(mock仿件‘桩件或者我们说的的打桩)[查看文档](./docs/MOCK-UNIT-TESTING.md.md)


## phpunit 安装
> phpunit有2中安装方式(1.归档安装, 2.composer安装)
> phpunit官网安装教程地址: http://www.phpunit.cn/manual/current/zh_cn/installation.html


### 使用composer安装
phpunit安装方式官网有介绍,本文利用了composer，安装自然也利用composer

#### 局部安装
在你的项目文件夹中，执行composer require "phpunit/phpunit:5.6.*",就会自动安装phpunit了。
或者在你的项目composer.json

```json
{
"require-dev": {
        "phpunit/phpunit": "^5.6"
    }
 }
```
局部安装会把phpunit可执行文件放在项目文件夹的/vendor/bin目录下。
执行的时候必须输入路径指向该目录下的vendor/bin/phpunit.bat才能访问。

#### 全局安装composer global require "phpunit/phpunit:5.6.*"
如果你从未通过 Composer 安装过全局的扩展包，运行composer global status你的窗口应该输出类似如下：
Changed current directory to <directory>
然后，将 <directory>/vendor/bin 增加到你的 PATH 环境变量中。现在， 我们可以在命令行中全局的使用phpunit命令了


## tests目录下是单元测试demo

### 使用步骤
```php
1. 执行:composer install
2. 在tests\Base\DB.php配置数据库信息
3. 导入dev/sql目录下的sql文件到数据库
4. 请在tests目录中运行命令
```

### 测试命令 

phpunit --bootstrap 引导文件
-----
> --bootstrap 在测试前先运行一个 "bootstrap" PHP 文件
* **--bootstrap引导测试:** phpunit --bootstrap tests/TestInit.php tests/Demo/

# 测试单个方法
* **测试单个方法:** phpunit --bootstrap tests/TestInit.php tests/Demo/Demo0Test --filter=test1

# 测试打桩
* **测试打桩:** phpunit --bootstrap tests/TestInit.php tests/Demo/Demo3Stubs1Test.php

# @group 分组使用
-----
> 测试可以用 @group 标注来标记为属于一个或多个组
* **demo_group_class:** phpunit --bootstrap tests/TestInit.php tests/Demo/ --group demo_group_class
* **demo_group_class0:** phpunit --bootstrap tests/TestInit.php tests/Demo/ --group demo_group_class0
* **demo_group_method_0:** phpunit --bootstrap tests/TestInit.php tests/Demo/ --group demo_group_method_0
* **demo_group_method_1:** phpunit --bootstrap tests/TestInit.php tests/Demo/ --group demo_group_method_1
* **demo_group_method_2:** phpunit --bootstrap tests/TestInit.php tests/Demo/ --group demo_group_method_2


phpunit --configuration 从XML文件读取配置
-----
> phpunit --configuration 从XML文件读取配置,运行测试用例
* **目录执行测试** phpunit --configuration tests/xml/phpunit-dir.xml
* **倒序执行测试** phpunit --configuration tests/xml/phpunit-order-desc.xml
* **分组执行测试** phpunit --configuration tests/xml/phpunit-group.xml
* **购物车分组执行测试** phpunit --configuration tests/xml/phpunit-cart-mock-group-cart-addProduct.xml