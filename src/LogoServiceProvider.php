<?php

namespace JeffersonGoncalves\Filament\Logo;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LogoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-logo')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        FilamentView::registerRenderHook(PanelsRenderHook::HEAD_END, fn () => view('filament-logo::styles'));
        FilamentView::registerRenderHook(PanelsRenderHook::TOPBAR_BEFORE, fn () => view('filament-logo::logo-before'));
    }
}
