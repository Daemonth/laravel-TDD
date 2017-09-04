<<<<<<< HEAD
# 基于laravel的单元测试案例
## 关于单元测试请参考我的博客：
<http://blog.raetlyw.com/>
## 单元测试的原则：
只测试一个工作单元，对于这个工作单元的理解是至关重要的，需要对中间的过程进行一来的分离，单元测试保证了代码的质量，但是只适应于高质量的单元测试。
## 开始驱动测试开发
1. 一个简单的例子:
  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/4.png)

Lumen测试方法链接：https://lumen.laravel-china.org/docs/5.3

Laravel断言方法参考：http://laravelacademy.org/post/7043.html



2. 数据模拟的方法：
  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/5.png)

注: 用 @dataProvider 标注来指定使用哪个数据供给器方法。



如果测试同时从 @dataProvider 方法和一个或多个 @depends 测试接收数据，那么来自于数据供给器的参数将先于来自所依赖的测试的。来自于所依赖的测试的参数对于每个数据集都是一样的。

  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/6.png)

### 数据库测试
* 测试数据库的准备（参考laravel官方文档-数据库迁移）：  
使用lumen自带的数据库迁移进行环境的初始化：
1. 使用 Artisan 命令 make:migration 来创建一个新的迁移：
	```
php artisan make:migration create_users_table
	```
2. 新的迁移位于 database/migrations 目录下，每个迁移文件名都包含时间戳从而允许 Laravel 判断其顺序。--table 和 --create 选项可以用于指定表名以及该迁移是否要创建一个新的数据表。这些选项只需要简单放在上述迁移命令后面并指定表名：
	```
php artisan make:migration create_users_table --create=users
php artisan make:migration add_votes_to_users_table --table=users
	```
如果你想要指定生成迁移的自定义输出路径，在执行 make:migration 命令时可以使用 --path 选项，提供的路径应该是相对于应用根目录的。
3. 迁移结构：
迁移类包含了两个方法：up 和 down。up 方法用于新增表，列或者索引到数据库，而 down 方法就是 up 方法的反操作，和up 里的操作相反。
在这里演示的是通过执行原生的sql语句进行的数据库迁移，你也可以通过laravel自带的数据库迁移语句进行迁移（ps:参考lumen官方文档），关键点是调用迁移的两个方法。
4. 运行迁移:
```
php artisan migrate
```
* 建立基境
参考链接：http://192.168.1.101/weiboyi-api/Rowling/trunk/tests/unit/Service/Operation/BalanceInServiceTest.php/BalanceInServiceTest.php
* 当测试完成时，数据库应该恢复到测试之前的状态（在这里我们用到事务来进行回滚）：
  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/7.png)

Lumen 提供了一个简洁的 DatabaseTransactions（ps:有趣的是这个方法是在你执行的测试外层套一层事务，即使你在测试内开启事务，也只会执行外层的事务）。

### 测试覆盖率
Lumen可以很好的得到测试覆盖率的分析文件，首先在phpunit.xml文件中添加这几行代码。会在public/code-coverage下生成HTML文件，当然你也可以自定义目录：

```
<logging>
    <log type="coverage-html" target="public/code-coverage" charset="UTF-8"/>
</logging>
```
添加测试白名单：为了只展示你想要知道的代码覆盖率，这个时候就需要添加白名单：
```
 <filter>
    <whitelist processUncoveredFilesFromWhitelist="true">
        <directory suffix=".php">./app/Http</directory>
        <directory suffix=".php">./app/Util</directory>
        <directory suffix=".php">./app/Service</directory>
    </whitelist>
   </filter>
   ```
 

这几行代码代表指定要展示的测试覆盖率文件目录，所以只会生成这几个文件的测试覆盖率


  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/8.png)

  ![TDD](http://blog.raetlyw.com/resources/2017-9-2/9.png)


Ps:图片中绿色部分是代表你的测试已经覆盖的代码，粉色部分代表没有覆盖的地方，你可以通过这些数据去调整你的单元测试。 

=======
# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
>>>>>>> origin/master
