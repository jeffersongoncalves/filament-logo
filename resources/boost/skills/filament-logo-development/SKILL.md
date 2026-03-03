---
name: filament-logo-development
description: Build and work with Filament Logo plugin features, including mobile logo display, render hooks, and responsive CSS styling.
---

# Filament Logo Development

## When to use this skill

Use this skill when:
- Adding logo display to a Filament panel on mobile devices
- Understanding how the plugin uses Filament render hooks
- Customizing logo appearance or behavior
- Troubleshooting logo visibility issues across screen sizes

## Architecture

The plugin uses a `PackageServiceProvider` (not a Filament Plugin class) to inject logo markup and styles via Filament render hooks. No panel registration is required.

### Namespace

```
JeffersonGoncalves\Filament\Logo
```

### Key Classes

| Class | Namespace | Purpose |
|-------|-----------|---------|
| `LogoServiceProvider` | `JeffersonGoncalves\Filament\Logo` | Registers render hooks for logo injection |

### Render Hooks

The `LogoServiceProvider` registers two render hooks in `packageRegistered()`:

```php
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

FilamentView::registerRenderHook(
    PanelsRenderHook::HEAD_END,
    fn (): View => view('filament-logo::styles')
);

FilamentView::registerRenderHook(
    PanelsRenderHook::TOPBAR_BEFORE,
    fn (): View => view('filament-logo::logo-before')
);
```

### Views

**`filament-logo::styles`** - Injects responsive CSS:

```html
<style>
    .logo-before {
        display: flex;
        padding: 0.5rem;
        justify-content: center;
        align-items: center;
    }
    @media (min-width: 1024px) {
        .logo-before {
            display: none;
        }
    }
</style>
```

**`filament-logo::logo-before`** - Injects logo markup:

```blade
<div class="logo-before">
    @if ($homeUrl = filament()->getHomeUrl())
        <a {{ \Filament\Support\generate_href_html($homeUrl) }}>
            <x-filament-panels::logo />
        </a>
    @else
        <x-filament-panels::logo />
    @endif
</div>
```

## Installation

```bash
composer require jeffersongoncalves/filament-logo:^3.0
```

### Version Compatibility

| Plugin Version | Filament Version | PHP Version |
|----------------|------------------|-------------|
| ^3.0 | ^5.0 | ^8.2 |
| ^2.0 | ^4.0 | ^8.2 |
| ^1.0 | ^3.0 | ^8.2 |

## Configuration

No configuration is required. The plugin works out of the box after installation.

### Customizing the Logo

The plugin uses Filament's built-in `<x-filament-panels::logo />` component. To customize the logo, override this component in your application:

```blade
{{-- resources/views/vendor/filament-panels/components/logo.blade.php --}}
<img src="{{ asset('images/my-logo.svg') }}" alt="My App" class="h-8" />
```

### Customizing the Styles

Publish the views to customize the CSS or markup:

```bash
php artisan vendor:publish --tag="filament-logo-views"
```

## Troubleshooting

### Logo not visible on mobile
**Cause**: The `filament-logo::styles` view may not be injected, or CSS may be overridden.
**Solution**: Verify the service provider is auto-discovered. Check that no other CSS is overriding `.logo-before` styles.

### Logo visible on desktop when it should be hidden
**Cause**: The `@media (min-width: 1024px)` breakpoint may conflict with custom CSS.
**Solution**: Check for CSS specificity issues. The `.logo-before` class uses `display: none` at 1024px+ breakpoints.

### Logo not linking to home
**Cause**: `filament()->getHomeUrl()` returns `null`.
**Solution**: Ensure your Filament panel has a home URL configured. The logo will render without a link if no home URL is set.
