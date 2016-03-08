<?php

require_once __DIR__.'/../vendor/autoload.php';

Dotenv::load(__DIR__.'/../');

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

$app->withFacades();
$app->withEloquent();

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->middleware([
    //Illuminate\Cookie\Middleware\EncryptCookies::class,
    //Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    //Illuminate\Session\Middleware\StartSession::class,
    //Illuminate\View\Middleware\ShareErrorsFromSession::class,
]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
]);

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

$app->register('App\Providers\CommandServiceProvider');

$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
    require __DIR__.'/../app/Http/routes.php';
});

return $app;
