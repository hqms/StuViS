<?php

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Bind the important interfaces into the container
$app->singleton(
    Http\Kernel::class,
    Kernel::class
);

$app->singleton(
    ConsoleKernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// Return the application instance
return $app;