<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static \UnitEnum|string|null $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Education';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Schemas\Components\Section::make('Education Details')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\TextInput::make('school_name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('degree')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('field_of_study')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('start_year')
                            ->numeric()
                            ->required()
                            ->minValue(1990)
                            ->maxValue(2030),

                        Forms\Components\TextInput::make('end_year')
                            ->numeric()
                            ->nullable()
                            ->minValue(1990)
                            ->maxValue(2030),

                        Forms\Components\Textarea::make('notes')
                            ->rows(3),

                        Forms\Components\Textarea::make('activities')
                            ->rows(2),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('degree')
                    ->sortable(),

                Tables\Columns\TextColumn::make('field_of_study')
                    ->sortable(),

                Tables\Columns\TextColumn::make('year_range')
                    ->label('Period'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
