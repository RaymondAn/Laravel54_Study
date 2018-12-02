<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

/**
 * @author anxing
 * 引入 composer 自动加载
 */
require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

/**
 * @author anxing
 * 创建服务容器 即 ioc 容器
 */
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

/**
 * @author anxing
 * 解析 http 核心
 */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
//dumplog($kernel,'kernel');

/**
 * @author anxing
 * 处理请求，生成响应
 */
$response = $kernel->handle(
    /**
     * 这里利用symfony的http  request 解析http请求
    */
    $request = Illuminate\Http\Request::capture()
);

/**
 * @author anxing
 * 发送响应
 */
$response->send();

$kernel->terminate($request, $response);

/**
 * @param $args
 * @param $name
 * @author anxing
 * 自定义打印日志函数
 */
function dumplog($args, $name){
    $pre_time = date('Y-m-d');
    $dir = '/Users/anxing/Desktop/logs/';
    $real_dir = file_exists($dir.$pre_time) ? $dir.$pre_time : mkdir($dir.$pre_time);
    error_log(print_r($args, true).PHP_EOL, 3, $real_dir.'/'.$name.'.log');
}
