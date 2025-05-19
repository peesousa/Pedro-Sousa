<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
// use App\Filament\Resources\BlogResource\RelationManagers; // Descomente se tiver relações futuras
use App\Models\Blog; // Certifique-se que o namespace do seu modelo está correto
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str; // Para gerar o slug
// Se precisar de um editor Markdown ou RichText específico, pode precisar de imports adicionais ou plugins

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // Ícone para o menu
    protected static ?string $navigationGroup = 'Conteúdo'; // Agrupa no menu com Projetos
    protected static ?string $navigationLabel = 'Posts do Blog'; // Nome no menu
    protected static ?string $modelLabel = 'Post do Blog'; // Singular
    protected static ?string $pluralModelLabel = 'Posts do Blog'; // Plural

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // Layout de 2 colunas para campos principais
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título do Post')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true) // Atualiza o slug ao perder o foco
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state, Forms\Get $get) => blank($get('slug')) ? $set('slug', Str::slug($state)) : null)
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL Amigável)')
                            ->required()
                            ->maxLength(255)
                            ->unique(Blog::class, 'slug', ignoreRecord: true) // Garante slug único
                            ->helperText('Gerado automaticamente a partir do título se deixado em branco.')
                            ->columnSpan(1),
                    ]),

                Forms\Components\FileUpload::make('cover_image_path')
                    ->label('Imagem de Capa')
                    ->directory('images/blog-covers') // Salvará em storage/app/public/images/blog-covers
                    ->image()
                    ->imageEditor() // Opcional: editor de imagem básico
                    ->helperText('Faça upload da imagem de capa do post.'),

                Forms\Components\Textarea::make('excerpt')
                    ->label('Resumo (Excerpt)')
                    ->rows(3)
                    ->helperText('Um breve resumo do post para listagens e SEO.')
                    ->columnSpanFull(),

                Forms\Components\MarkdownEditor::make('content') // Editor Markdown
                    ->label('Conteúdo Principal')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Escreva o conteúdo do seu post usando Markdown.'),
                // Alternativa: RichEditor (WYSIWYG)
                // Forms\Components\RichEditor::make('content')
                //     ->label('Conteúdo Principal')
                //     ->required()
                //     ->columnSpanFull(),

                Forms\Components\Section::make('Publicação e SEO')
                    ->collapsible() // Torna a seção recolhível
                    ->schema([
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Data de Publicação')
                            ->helperText('Deixe em branco para não publicar ou defina uma data futura para agendar.'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Rascunho',
                                'published' => 'Publicado',
                            ])
                            ->default('draft')
                            ->required(),

                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Título (SEO)')
                            ->maxLength(255)
                            ->helperText('Opcional. Título para otimização de busca (geralmente 60-70 caracteres).'),

                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Descrição (SEO)')
                            ->rows(2)
                            ->maxLength(160) // Limite comum para meta descriptions
                            ->helperText('Opcional. Descrição curta para otimização de busca (geralmente 150-160 caracteres).'),
                    ])->columns(2), // Layout de 2 colunas para esta seção
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image_path')
                    ->label('Capa')
                    ->disk('public'), // Garanta que o disco público está linkado

                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(50) // Limita o texto para não quebrar a tabela
                    ->tooltip(fn (Blog $record): string => $record->title), // Mostra completo no hover

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Escondido por padrão, mas pode ser ativado

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        default => 'warning',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publicado em')
                    ->dateTime('d/m/Y H:i') // Formato de data e hora
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Rascunho',
                        'published' => 'Publicado',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(), // Adiciona ação para visualizar o registro
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc'); // Ordena por padrão pelos mais recentes publicados
    }

    public static function getRelations(): array
    {
        return [
            // Se você tiver relações, como Comentários, elas seriam definidas aqui. Ex:
            // RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
            'view' => Pages\ViewBlog::route('/{record}'),
        ];
    }
}
