<?php

namespace Moox\Press;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Moox\Press\Resources\WpTermResource;
use Moox\Press\Resources\WpTermMetaResource;
use Moox\Press\Resources\WpUserMetaResource;
use Moox\Press\Resources\WpCommentMetaResource;
use Filament\Support\Concerns\EvaluatesClosures;

class WpCommentMetaPlugin implements Plugin
{
    use EvaluatesClosures;

    public function getId(): string
    {
        return 'wp-commentmeta';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            WpCommentMetaResource::class,
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
