<?php

namespace App\Filament\Resources\CastMemberResource\Pages;

use App\Filament\Resources\CastMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCastMember extends EditRecord
{
    protected static string $resource = CastMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
