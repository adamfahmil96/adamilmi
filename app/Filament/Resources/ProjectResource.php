<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-briefcase';

    protected static \UnitEnum|string|null $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Schemas\Components\Grid::make()
                    ->columnSpanFull()
                    ->columns(4)
                    ->schema([
                        Schemas\Components\Grid::make(1)
                            ->schema([
                                Schemas\Components\Section::make('Project Details')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(Project::class, 'slug', ignoreRecord: true),

                                        Forms\Components\Textarea::make('description')
                                            ->required()
                                            ->rows(3)
                                            ->maxLength(500),

                                        Forms\Components\RichEditor::make('content')
                                            ->columnSpanFull()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'link',
                                                'blockquote',
                                                'codeBlock',
                                                'h2',
                                                'h3',
                                                'bulletList',
                                                'orderedList',
                                                'redo',
                                                'undo',
                                            ]),

                                        Forms\Components\FileUpload::make('image')
                                            ->image()
                                            ->directory('projects')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Schemas\Components\Section::make('Links & Technologies')
                                    ->schema([
                                        Forms\Components\TextInput::make('github_url')
                                            ->label('GitHub URL')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('live_url')
                                            ->label('Live Demo URL')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TagsInput::make('technologies')
                                            ->placeholder('Add technology...')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ])
                            ->columnSpan(3),

                        Schemas\Components\Section::make('Settings')
                            ->schema([
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->default(false),

                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('technologies')
                    ->badge()
                    ->limitList(3),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueLabel('Featured only')
                    ->falseLabel('Non-featured only')
                    ->native(false),
            ])
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
