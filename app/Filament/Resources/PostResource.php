<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Toggle;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                Card::make()->columns(1)->schema([
                    Forms\Components\TextInput::make('post_name')->required()->label('Oyun Adı'),
                    Forms\Components\RichEditor::make('post_body')->required()->label('İçerik'),
                    Forms\Components\TextInput::make('t_link')->required()->label('Torrent Linki'),
                    Forms\Components\TextInput::make('keywords')->required()->label('Anahtar Kelimeler'),
                    Card::make()->columns(2)->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->options(Category::all()->pluck('category_name', 'id'))
                            ->searchable(),
                        Select::make('category_name')
                            ->label('Etiket Kategori')
                            ->options(Category::all()->pluck('category_name', 'category_name'))
                            ->searchable(),
                        Card::make()->columns(3)->schema([
                            FileUpload::make('image1')
                                ->image()
                                ->label('Kapak Resmi')
                                ->imagePreviewHeight('250')
                                ->directory('img')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return (string) str($file->getClientOriginalName())->prepend('oyun-');
                                }),
                            FileUpload::make('image2')
                                ->image()
                                ->label('Tanıtım Resmi 1')
                                ->imagePreviewHeight('250')
                                ->directory('img')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return (string) str($file->getClientOriginalName())->prepend('oyun-');
                                }),
                            FileUpload::make('image3')
                                ->image()
                                ->label('Tanıtım Resmi 2')
                                ->imagePreviewHeight('250')
                                ->directory('img')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return (string) str($file->getClientOriginalName())->prepend('oyun-');
                                })
                        ]),
                        Card::make()->columns(3)->schema([
                            Forms\Components\TextInput::make('developer')->required()->label('Developer'),
                            Forms\Components\TextInput::make('release_year')->required()->label('Release Tarihi'),
                            Forms\Components\TextInput::make('size')->required()->label('Boyut'),
                            Forms\Components\TextInput::make('game_version')->required()->label('Oyun Versiyonu'),
                            Forms\Components\TextInput::make('steam_link')->required()->label('Steam Linki'),
                            Forms\Components\TextInput::make('dlcs')->required()->label('DLCler'),
                            Toggle::make('recommended'),
                            Forms\Components\TextInput::make('seo_description')->required()->label('Seo Açıklaması'),
                        ]),
                    ])
                ])
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('category_name'),
                Tables\Columns\TextColumn::make('post_name'),
            ])
            ->filters([
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}