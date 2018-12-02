<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

/**
 * @author anxing
 * 绑定一些重要的接口
 * 绑定一个只需要解析一次的类或接口到容器，然后接下来对容器的调用会返回同一个实例
 * 即以后需要使用Illuminate\Contracts\Http\Kernel这个类时，会返回App\Http\Kernel
 * 使用代码 $app->make('Illuminate\Contracts\Http\Kernel')
 */

/**
 * @author anxing
 * 这里绑定的是 http 启动的一些启动服务和中间件。
 */
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

/**
 * @author anxing
 * 这里绑定的是控制体服务 即 php artisan, 如果上线了可省去。
 */
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/**
 * @author anxing
 * 绑定错误提示类,上线后可以省去。
 */
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

/**
 * @author anxing
 * 返回 app 容器
 */
return $app;
