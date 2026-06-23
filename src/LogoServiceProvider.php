<?php

namespace JeffersonGoncalves\Filament\Logo;

use Filament\View\PanelsRenderHook;
use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class LogoServiceProvider extends BasePackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-logo')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->registerRenderHooks([
            PanelsRenderHook::HEAD_END => 'filament-logo::styles',
            PanelsRenderHook::TOPBAR_BEFORE => 'filament-logo::logo-before',
            PanelsRenderHook::TOPBAR_START => 'filament-logo::logo-start',
        ]);
    }
}
