<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título do Projeto')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state, Forms\Get $get) => blank($get('slug')) ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug (URL Amigável)')
                    ->required()
                    ->maxLength(255)
                    ->unique(Project::class, 'slug', ignoreRecord: true),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Imagem Principal')
                    ->directory('images/portfolio')
                    ->image()
                    ->imageEditor()
                    ->required(),

                Forms\Components\TextInput::make('category_name')
                    ->label('Nome da Categoria')
                    ->maxLength(255),

                Forms\Components\Textarea::make('short_description')
                    ->label('Descrição Curta')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('full_description')
                    ->label('Descrição Completa')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('technologies_used')
                    ->label('Tecnologias Usadas')
                    ->helperText('Ex: Laravel, Tailwind CSS, Alpine.js')
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('client_name')
                    ->label('Nome do Cliente')
                    ->maxLength(255),

                Forms\Components\DatePicker::make('project_date')
                    ->label('Data do Projeto'),

                Forms\Components\TextInput::make('live_project_url')
                    ->label('URL do Projeto Online')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('repository_url')
                    ->label('URL do Repositório')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_featured')
                    ->label('Destacado?')
                    ->inline(false),

                Forms\Components\TextInput::make('sort_order')
                    ->label('Ordem de Exibição')
                    ->numeric()
                    ->default(0),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Rascunho',
                        'published' => 'Publicado',
                        'archived' => 'Arquivado',
                    ])
                    ->default('draft')
                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Imagem')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_name')
                    ->label('Categoria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
