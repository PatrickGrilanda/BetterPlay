<?php

namespace App\Filament\Resources;

use App\Enums\CensureType;
use App\Enums\ImageTypes;
use App\Enums\MediaTypes;
use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Informações do vídeo')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Título')
                                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                                        if (filled($state)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    })
                                    ->required()
                                    ->reactive()
                                    ->columnSpan('full'),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->columnSpan('full'),
                                Textarea::make('description')
                                    ->label('Descrição')
                                    ->required()
                                    ->columnSpan('full'),
                                TextInput::make('year_launched')
                                    ->label('Ano de lançamento')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('duration')
                                    ->label('Duração (min)')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan(2),
                                Select::make('censure')
                                    ->label('Censura')
                                    ->required()
                                    ->options(CensureType::toArray())
                                    ->preload()
                                    ->columnSpan(2),
                                Select::make('category_id')
                                    ->label('Categoria')
                                    ->required()
                                    ->multiple()
                                    ->preload()
                                    ->relationship('categories', 'name')
                                    ->columnSpan(2),
                                Select::make('genre_id')
                                    ->label('Gênero')
                                    ->required()
                                    ->multiple()
                                    ->preload()
                                    ->relationship('genres', 'name')
                                    ->columnSpan(2),
                                Select::make('cast_member_id')
                                    ->label('Elenco')
                                    ->multiple()
                                    ->relationship('castMembers', 'name')
                                    ->columnSpan(2),
                            ])->columns(4)
                    ])->columnSpan('full'),
                Fieldset::make('Imagem')
                    ->schema([
                        FileUpload::make('path_banner')
                            ->label('Banner')
                            ->directory('images/banners')
                            ->columnSpan(2),
                        FileUpload::make('path_thumb')
                            ->label('Thumb')
                            ->directory('images/thumb')
                            ->columnSpan(2),
                        FileUpload::make('path_half_thumb')
                            ->label('Half Thumb')
                            ->directory('images/half_thumb')
                            ->columnSpan(2),
                    ])
                    ->columns(2),
                Fieldset::make('Video')
                    ->schema([
                        FileUpload::make('path_media')
                            ->label('Media')
                            ->directory('videos/media')
                            ->columnSpan(2),

                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->limit(20)->sortable()->searchable()
                    ->label('Título'),
                TextColumn::make('year_launched')->sortable()->searchable()
                    ->label('Ano de lançamento'),
                TextColumn::make('duration')->sortable()->searchable()
                    ->label('Duração'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
