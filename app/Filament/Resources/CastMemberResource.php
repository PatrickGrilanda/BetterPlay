<?php

namespace App\Filament\Resources;

use App\Enums\CastMemberType;
use App\Filament\Resources\CastMemberResource\Pages;
use App\Filament\Resources\CastMemberResource\RelationManagers;
use App\Models\CastMember;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CastMemberResource extends Resource
{
    protected static ?string $model = CastMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static function getNavigationGroup(): ?string
    {
        return ('Configurações do vídeo');
    }

    public static function getNavigationLabel(): string
    {
        return ('Elenco');
    }


    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getModelLabel(): string
    {
        return ('Elenco');
    }

    public static function getPluralModelLabel(): string
    {
        return ('Elencos');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->label('Título')
                        ->required(),

                    Select::make('type')->label('Tipo')
                        ->options(CastMemberType::toArray())
                        ->searchable()
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->limit(20)
                    ->sortable()
                    ->searchable()
                    ->label('Nome'),
                TextColumn::make('type')
                    ->limit(20)
                    ->sortable()
                    ->searchable()
                    ->label('Tipo')
                    ->getStateUsing(function (Model $record): string {
                        if ($record->type == 1) return 'Diretor';
                        if ($record->type == 2) return 'Ator';
                        return $record->type;
                    }),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCastMembers::route('/'),
            'create' => Pages\CreateCastMember::route('/create'),
            'edit' => Pages\EditCastMember::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
