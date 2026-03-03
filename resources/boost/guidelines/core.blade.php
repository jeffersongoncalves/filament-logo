## Filament Logo

A zero-configuration Filament plugin that displays the panel logo on mobile devices at the top of the panel. Uses Filament render hooks for automatic injection.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-logo:^3.0
</code-snippet>
@endverbatim

### How It Works

No plugin registration needed. The package auto-registers via `LogoServiceProvider` and uses Filament render hooks:

@verbatim
<code-snippet name="LogoServiceProvider render hooks" lang="php">
use JeffersonGoncalves\Filament\Logo\LogoServiceProvider;

// Automatically registered via service provider:
// PanelsRenderHook::HEAD_END    -> injects CSS styles
// PanelsRenderHook::TOPBAR_BEFORE -> injects logo markup
</code-snippet>
@endverbatim

### Behavior

- On mobile: logo appears at the top of the panel (before the topbar)
- On desktop (1024px+): logo is hidden via CSS (`display: none`)
- Logo links to `filament()->getHomeUrl()` when available
- Uses the `<x-filament-panels::logo />` component for consistent branding

### Features
- Zero configuration required -- works out of the box after installation
- Responsive display: visible on mobile, hidden on desktop
- Automatic home URL linking via Filament's `getHomeUrl()`
- Uses Filament's built-in `<x-filament-panels::logo />` component

### Best Practices
- Customize the logo by overriding Filament's `<x-filament-panels::logo />` Blade component
- No panel plugin registration is needed -- the service provider handles everything
- The plugin respects Filament's `getHomeUrl()` for logo link destination
