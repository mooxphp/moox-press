<?php

namespace Moox\Training\Resources\TrainingInvitationResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Moox\Training\Jobs\SendInvitations;
use Moox\Training\Resources\TrainingInvitationResource;

class EditTrainingInvitation extends EditRecord
{
    protected static string $resource = TrainingInvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendInvitations')
                ->label('Send Invitations')
                ->action(function () {
                    SendInvitations::dispatch($this->record->getKey());
                })
                ->requiresConfirmation()
                ->color('primary'),
            DeleteAction::make(),
        ];
    }
}