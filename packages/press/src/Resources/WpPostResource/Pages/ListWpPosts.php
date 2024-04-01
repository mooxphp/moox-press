<?php

namespace Moox\Press\Resources\WpPostResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Moox\Press\Resources\WpPostResource;

class ListWpPosts extends ListRecords
{
    protected static string $resource = WpPostResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
