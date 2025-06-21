<div class="mx-auto p-2 block lg:hidden">
    @if ($homeUrl = filament()->getHomeUrl())
        <a {{ \Filament\Support\generate_href_html($homeUrl) }}>
            <x-filament-panels::logo />
        </a>
    @else
        <x-filament-panels::logo />
    @endif
</div>
