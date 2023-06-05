<?php

namespace App\Filament\Resources\VideoResource\Pages;


use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\VideoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditVideo extends EditRecord
{
    protected static string $resource = VideoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // $data['media_type'] = Storage::disk('public')->mimeType($data['path_media']);

        return $data;
    }



    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // dd($data);
        $record->update($data);

        return $record;
    }
}
