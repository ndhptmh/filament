<?php

namespace App\Filament\User\Resources\TaskResource\Pages;

use App\Filament\User\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Successfully add data!')
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
