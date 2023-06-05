<?php

namespace App\Filament\Resources\VideoResource\Pages;


use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\VideoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateVideo extends CreateRecord
{
    protected static string $resource = VideoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        //$data['media_type'] = Storage::disk('public')->mimeType($data['path_media']);

        return $data;
    }
    protected function handleRecordCreation(array $data): Model
    {

        $record =  static::getModel()::create($data);
        return $record;
    }
}
