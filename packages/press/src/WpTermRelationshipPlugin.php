<?php

namespace Moox\Press;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Moox\Press\Resources\WpTermMetaResource;
use Moox\Press\Resources\WpUserMetaResource;
use Filament\Support\Concerns\EvaluatesClosures;
use Moox\Press\Resources\WpTermRelationshipResource;

class WpTermRelationshipPlugin implements Plugin
{
    use EvaluatesClosures;

    public function getId(): string
    {
        return 'wp-term_relationships';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            WpTermRelationshipResource::class,
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
