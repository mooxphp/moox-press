<?php

namespace Moox\Press;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Moox\Press\Resources\WpTermMetaResource;
use Moox\Press\Resources\WpUserMetaResource;
use Filament\Support\Concerns\EvaluatesClosures;

class WpTermMetaPlugin implements Plugin
{
    use EvaluatesClosures;

    public function getId(): string
    {
        return 'wp-termmeta';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            WpTermMetaResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
