<?php

namespace App\Filament\Admin\Resources\StatusResource\Pages;

use App\Filament\Admin\Resources\StatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditStatus extends EditRecord
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('Successfully edited data!')
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
