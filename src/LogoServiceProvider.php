<?php
namespace JeffersonGoncalves\Filament\Logo;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
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
        FilamentView::registerRenderHook(PanelsRenderHook::HEAD_END, fn (): View => view('filament-logo::styles'));
        FilamentView::registerRenderHook(PanelsRenderHook::TOPBAR_BEFORE, fn (): View => view('filament-logo::logo-before'));
        FilamentView::registerRenderHook(PanelsRenderHook::TOPBAR_START, fn (): View => view('filament-logo::logo-start'));
    }
}
