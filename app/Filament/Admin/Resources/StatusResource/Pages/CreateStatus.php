<?php

namespace App\Filament\Admin\Resources\StatusResource\Pages;

use App\Filament\Admin\Resources\StatusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateStatus extends CreateRecord
{
    protected static string $resource = StatusResource::class;

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
