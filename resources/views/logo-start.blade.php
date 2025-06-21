<div x-cloak x-data="{}" x-show="!$store.sidebar.isOpen" x-transition.opacity.300ms class="logo-start">
    @if ($homeUrl = filament()->getHomeUrl())
        <a {{ \Filament\Support\generate_href_html($homeUrl) }}>
            <x-filament-panels::logo/>
        </a>
    @else
        <x-filament-panels::logo/>
    @endif
</div>
