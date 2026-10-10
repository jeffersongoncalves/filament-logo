<?php

use Illuminate\Support\Facades\Blade;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    'JeffersonGoncalves\\Filament\\Logo\\LogoServiceProvider',
]);

it('compiles every Blade view it ships', function (string $file) {
    expect(Blade::compileString((string) file_get_contents(__DIR__.'/../../'.$file)))->toBeString();
})->with([
    'resources/views/logo-before.blade.php',
    'resources/views/logo-start.blade.php',
    'resources/views/styles.blade.php',
]);
