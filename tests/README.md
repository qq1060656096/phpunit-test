phpunit-test单元测试说明
===============================



phpunit --bootstrap 引导文件
-----
> --bootstrap 在测试前先运行一个 "bootstrap" PHP 文件
* **--bootstrap引导测试:** phpunit --bootstrap TestInit.php Demo/


@group 分组使用
-----
> 测试可以用 @group 标注来标记为属于一个或多个组
* **demo_group_class:** phpunit --bootstrap TestInit.php Demo/ --group demo_group_class
* **demo_group_class0:** phpunit --bootstrap TestInit.php Demo/ --group demo_group_class0
* **demo_group_method_0:** phpunit --bootstrap TestInit.php Demo/ --group demo_group_method_0
* **demo_group_method_1:** phpunit --bootstrap TestInit.php Demo/ --group demo_group_method_1
* **demo_group_method_2:** phpunit --bootstrap TestInit.php Demo/ --group demo_group_method_2


phpunit --configuration 从XML文件读取配置
-----
> phpunit --configuration 从XML文件读取配置,运行测试用例
* **目录执行测试** phpunit --configuration xml/phpunit-dir.xml
* **倒序执行测试** phpunit --configuration xml/phpunit-order-desc.xml
* **分组执行测试** phpunit --configuration xml/phpunit-group.xml
* **分组执行测试** phpunit --configuration xml/phpunit-group-account-getByUid.xml


