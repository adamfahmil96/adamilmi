# Tutorial Dasar Filament PHP

**Versi:** Filament 5.x (Juni 2026)
**Framework:** Laravel 13.x
**Penulis:** Muhammad Adam Fahmil 'Ilmi

---

## Daftar Isi

1. [Apa itu Filament?](#1-apa-itu-filament)
2. [Arsitektur Filament](#2-arsitektur-filament)
3. [Instalasi](#3-instalasi)
4. [Panel](#4-panel)
5. [Resource (CRUD)](#5-resource-crud)
6. [Form (Input)](#6-form-input)
7. [Table (Tampilan Data)](#7-table-tampilan-data)
8. [Relasi](#8-relasi)
9. [Page Kustom](#9-page-kustom)
10. [Widget](#10-widget)
11. [Navigasi](#11-navigasi)
12. [Hak Akses](#12-hak-akses)
13. [Perintah Penting](#13-perintah-penting)
14. [Tips & Trik](#14-tips--trik)

---

## 1. Apa itu Filament?

Filament adalah **admin panel framework** untuk Laravel yang memungkinkan Anda membuat dashboard admin dengan cepat tanpa menulis banyak kode HTML/CSS/JS.

### Keunggulan Filament

- **CRUD otomatis** - Buat Create, Read, Update, Delete dalam hitungan menit
- **Form builder** - Drag & drop style form builder di kode
- **Table builder** - Filter, sort, search, action otomatis
- **Batteries included** - Auth, dashboard, notifications sudah built-in
- **Komponen kaya** - TextInput, Select, FileUpload, RichEditor, dll
- **Responsive** - Tampilan menyesuaikan desktop dan mobile
- **Tema customizable** - Warna, font, layout bisa diubah

### Kapan Menggunakan Filament?

| Cocok | Kurang Cocok |
|---|---|
| Admin panel internal | Website publik yang kompleks |
| CRUD management | Frontend yang sangat custom |
| Dashboard monitoring | Aplikasi real-time (chat, dll) |
| Content management | Aplikasi mobile |

---

## 2. Arsitektur Filament

Filament memiliki hierarki sebagai berikut:

```
Panel (Halaman Admin)
├── Resources (CRUD untuk Model)
│   ├── Pages (List, Create, Edit, View)
│   ├── RelationManagers (Relasi inline)
│   └── Widgets (Statistik, Chart)
├── Pages (Halaman Kustom)
└── Widgets (Komponen Dashboard)
```

### Penjelasan Komponen

#### Panel
Panel adalah "wadah" utama admin panel. Biasanya hanya satu panel (default), tapi bisa membuat beberapa panel untuk role berbeda.

```
/admin  → Panel Admin (kelola semua)
/member → Panel Member (fitur terbatas)
```

#### Resource
Resource adalah **jantung Filament**. Setiap Resource merepresentasikan satu Model dan menyediakan CRUD otomatis.

```
PostResource → CRUD untuk Model Post
UserResource → CRUD untuk Model User
```

#### Pages
Pages adalah halaman kustom di dalam panel, misalnya Dashboard, Settings, atau halaman kalkulasi.

#### RelationManagers
RelationManagers mengelola relasi model secara inline, misalnya mengelola Comments dari halaman Post.

#### Widgets
Widget adalah komponen kecil yang biasanya ditampilkan di Dashboard, seperti statistik atau chart.

---

## 3. Instalasi

### 3.1 Install Filament ke Project Laravel

```bash
composer require filament/filament:"^5.0"
```

### 3.2 Install Panel (Pertama Kali)

```bash
php artisan filament:install --panels
```

Perintah ini akan:
1. Membuat `AdminPanelProvider` di `app/Providers/Filament/`
2. Publish resource views
3. Publish configuration

### 3.3 Buat Admin User

```bash
php artisan make:filament-user
```

Anda akan diminta memasukkan nama, email, dan password.

### 3.4 Publish Assets

```bash
php artisan filament:assets
```

### 3.5 Akses Admin Panel

```
http://localhost:8000/admin
```

Login dengan email dan password yang sudah dibuat.

---

## 4. Panel

### 4.1 Lokasi File

Panel dikonfigurasi di:
```
app/Providers/Filament/AdminPanelProvider.php
```

### 4.2 Konfigurasi Dasar

```php
<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()                    // Panel default
            ->id('admin')                  // ID panel
            ->path('admin')                // URL path /admin
            ->login()                      // Aktifkan halaman login
            ->brandName('Admin Panel')     // Nama brand
            ->favicon('/favicon.ico')      // Favicon
            ->font('Inter')                // Font utama
            ->colors([                     // Warna tema
                'primary' => Color::Indigo,
            ])
            ->topNavigation()              // Navigasi di atas
            ->sidebarCollapsibleOnDesktop() // Sidebar bisa collapse
            ->discoverResources(           // Auto-detect resources
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )
            ->discoverPages(               // Auto-detect pages
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages'
            )
            ->pages([
                \Filament\Pages\Dashboard::class,
            ])
            ->discoverWidgets(             // Auto-detect widgets
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            );
    }
}
```

### 4.3 Opsi Navigasi

```php
// Sidebar di kiri (default)
->sidebarCollapsibleOnDesktop()

// Navigasi di atas
->topNavigation()

// Sidebar tidak bisa collapse
->sidebarFullyCollapsibleOnDesktop()
```

### 4.4 Multi-Panel

Anda bisa membuat beberapa panel untuk role berbeda:

```bash
php artisan make:filament-panel member
```

Ini akan membuat `MemberPanelProvider` baru.

---

## 5. Resource (CRUD)

### 5.1 Membuat Resource

```bash
# Basic resource
php artisan make:filament-resource Post

# Resource dengan form & table generator
php artisan make:filament-resource Post --generate

# Simple resource (tanpa view page)
php artisan make:filament-resource Post --simple

# Resource dengan soft deletes
php artisan make:filament-resource Post --soft-deletes
```

### 5.2 Struktur File Resource

```
app/Filament/Resources/
└── PostResource.php                    ← Resource utama
    └── PostResource/
        └── Pages/
            ├── ListPosts.php           ← Halaman daftar
            ├── CreatePost.php          ← Halaman buat
            ├── EditPost.php            ← Halaman edit
            └── ViewPost.php            ← Halaman lihat detail
```

### 5.3 Anotomi Resource

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Actions;                    // ← Untuk table actions (Filament 5)
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas;                    // ← Untuk Section component (Filament 5)
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    // Model yang di-crud
    protected static ?string $model = Post::class;

    // Ikon di sidebar (Heroicon)
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // Label navigasi
    protected static ?string $navigationLabel = 'Posts';

    // Grup navigasi
    protected static ?string $navigationGroup = 'Content';

    // Urutan di navigasi
    protected static ?int $navigationSort = 1;

    // Judul halaman index
    protected static ?string $recordTitleAttribute = 'title';

    // Definisi form (create & edit)
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Schemas\Components\Section::make('Informasi')  // ← Filament 5
                    ->schema([
                        Forms\Components\TextInput::make('title'),
                        // Komponen form lainnya
                    ]),
            ]);
    }

    // Definisi tabel (list)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom di sini
            ])
            ->filters([
                // Filter di sini
            ])
            ->actions([
                Actions\EditAction::make(),      // ← Filament 5 (bukan Tables\Actions)
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Relasi yang ditampilkan
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman yang tersedia
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
```

> **⚠️ Perubahan Filament 5:**
> - `Filament\Tables\Actions\*` → `Filament\Actions\*`
> - `Filament\Forms\Components\Section` → `Filament\Schemas\Components\Section`
> - `Filament\Forms\Form` → `Filament\Schemas\Schema`
> - `form(Form $form)` → `form(Schema $schema)`

### 5.4 Menggunakan `--generate`

Perintah `--generate` akan otomatis membuat form dan table berdasarkan kolom database:

```bash
php artisan make:filament-resource Post --generate
```

Ini sangat menghemat waktu untuk scaffolding awal.

---

## 6. Form (Input)

Form digunakan di halaman **Create** dan **Edit** untuk memasukkan data.

### 6.1 Komponen Dasar

#### TextInput
```php
use Filament\Forms\Components\TextInput;

TextInput::make('title')
    ->label('Judul')           // Label
    ->required()               // Wajib diisi
    ->maxLength(255)           // Maksimal karakter
    ->placeholder('Masukkan judul...')
    ->helperText('Judul artikel')
    ->columnSpanFull()         // Lebar penuh
```

#### Textarea
```php
use Filament\Forms\Components\Textarea;

Textarea::make('excerpt')
    ->label('Ringkasan')
    ->rows(3)                  // Tinggi textarea
    ->required()
    ->maxLength(500)
```

#### RichEditor (WYSIWYG)
```php
use Filament\Forms\Components\RichEditor;

RichEditor::make('content')
    ->label('Konten')
    ->required()
    ->columnSpanFull()
    ->toolbarButtons([
        'bold', 'italic', 'underline', 'strike',
        'link', 'blockquote', 'codeBlock',
        'h2', 'h3',                    // ← Filament 5 (bukan 'heading')
        'bulletList', 'orderedList',
        'redo', 'undo',
    ])
```

> **⚠️ Perubahan Filament 5:** Toolbar button `'heading'` dipecah menjadi `'h1'`, `'h2'`, `'h3'`, `'h4'`, `'h5'`, `'h6'`.

#### Select (Dropdown)
```php
use Filament\Forms\Components\Select;

// Manual options
Select::make('status')
    ->options([
        'draft' => 'Draft',
        'published' => 'Published',
    ])
    ->default('draft')

// Dari database (relationship)
Select::make('category_id')
    ->relationship('category', 'name')
    ->searchable()
    ->preload()
    ->required()

// Dari enum
Select::make('category')
    ->options(\App\Enums\Category::class)
```

#### Toggle (Boolean)
```php
use Filament\Forms\Components\Toggle;

Toggle::make('is_published')
    ->label('Published')
    ->default(false)
```

#### DatePicker
```php
use Filament\Forms\Components\DatePicker;

DatePicker::make('published_at')
    ->label('Tanggal Publish')
    ->default(now())
    ->displayFormat('d/m/Y')   // Format tampilan
```

#### FileUpload
```php
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()                  // Hanya gambar
    ->directory('posts')       // Folder penyimpanan
    ->maxSize(2048)            // Maksimal 2MB
    ->imageCropAspectRatio('16:9')  // Rasio crop
    ->columnSpanFull()
```

#### ColorPicker
```php
use Filament\Forms\Components\ColorPicker;

ColorPicker::make('color')
    ->label('Warna')
```

#### TagsInput
```php
use Filament\Forms\Components\TagsInput;

TagsInput::make('technologies')
    ->placeholder('Tambah teknologi...')
    ->separator(',')           // Pisahkan dengan koma
```

#### Slider
```php
use Filament\Forms\Components\Slider;

Slider::make('proficiency')
    ->min(0)
    ->max(100)
    ->step(5)
```

### 6.2 Layout Komponen

#### Section (Grup)
```php
use Filament\Schemas\Components\Section;  // ← Filament 5 (bukan Forms\Components)

Section::make('Informasi Dasar')
    ->description('Isi informasi dasar postingan')
    ->schema([
        TextInput::make('title'),
        Textarea::make('excerpt'),
    ])
    ->columns(2)               // 2 kolom grid
    ->collapsible()            // Bisa di-collapse
```

> **⚠️ Perubahan Filament 5:** `Section` dipindahkan dari `Filament\Forms\Components` ke `Filament\Schemas\Components`.

#### Grid (Kolom)
```php
use Filament\Forms\Components\Grid;

Grid::make(3)                  // 3 kolom
    ->schema([
        TextInput::make('name'),
        TextInput::make('email'),
        TextInput::make('phone'),
    ])
```

#### Tabs
```php
use Filament\Forms\Components\Tabs;

Tabs::make('Tabs')
    ->tabs([
        Tab::make('Konten')
            ->schema([
                TextInput::make('title'),
                RichEditor::make('content'),
            ]),
        Tab::make('SEO')
            ->schema([
                TextInput::make('meta_title'),
                Textarea::make('meta_description'),
            ]),
    ])
```

### 6.3 Live Update (Auto Slug)

```php
TextInput::make('title')
    ->required()
    ->live(onBlur: true)       // Update saat blur
    ->afterStateUpdated(function (Forms\Set $set, ?string $state) {
        $set('slug', \Illuminate\Support\Str::slug($state));
    }),

TextInput::make('slug')
    ->required()
    ->unique(ignoreRecord: true)
```

### 6.4 Conditional Field

```php
Toggle::make('is_current')
    ->label('Posisi Saat Ini')
    ->live()                   // Update saat berubah
    ->afterStateUpdated(function (Forms\Set $set, ?bool $state) {
        if ($state) {
            $set('end_date', null);
        }
    }),

DatePicker::make('end_date')
    ->label('Tanggal Selesai')
    ->hidden(fn (Forms\Get $get) => $get('is_current'))  // Sembunyi jika current
```

---

## 7. Table (Tampilan Data)

Table digunakan di halaman **List** untuk menampilkan data.

### 7.1 Kolom Dasar

#### TextColumn
```php
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->label('Judul')
    ->searchable()             // Bisa dicari
    ->sortable()               // Bisa diurutkan
    ->limit(50)                // Potong teks
    ->words(10)                // Potong per kata
    ->wrap()                   // Wrap teks panjang
```

#### IconColumn (Boolean)
```php
use Filament\Tables\Columns\IconColumn;

IconColumn::make('is_published')
    ->boolean()                // Tampilkan ✓ atau ✗
    ->sortable()
```

#### ImageColumn
```php
use Filament\Tables\Columns\ImageColumn;

ImageColumn::make('image')
    ->disk('public')
    ->circular()               // Bentuk lingkaran
    ->size(40)                 // Ukuran 40px
```

#### BadgeColumn
```php
use Filament\Tables\Columns\TextColumn;

TextColumn::make('status')
    ->badge()                  // Tampilan badge
    ->color(fn (string $state): string => match ($state) {
        'draft' => 'gray',
        'published' => 'success',
        'archived' => 'danger',
    })
```

#### Relationship Column
```php
TextColumn::make('category.name')      // Relasi belongsTo
    ->sortable()

TextColumn::make('posts_count')        // Count relasi
    ->counts('posts')
    ->sortable()
```

### 7.2 Filter

#### TernaryFilter (Boolean)
```php
use Filament\Tables\Filters\TernaryFilter;

TernaryFilter::make('is_published')
    ->label('Status')
    ->boolean()
    ->trueLabel('Published')
    ->falseLabel('Draft')
    ->native(false)
```

#### SelectFilter
```php
use Filament\Tables\Filters\SelectFilter;

SelectFilter::make('category_id')
    ->relationship('category', 'name')
    ->searchable()
    ->preload()
```

### 7.3 Actions

#### Row Actions (Per Baris)
```php
use Filament\Actions;  // ← Filament 5 (bukan Filament\Tables\Actions)

->actions([
    Actions\ViewAction::make(),      // Lihat
    Actions\EditAction::make(),      // Edit
    Actions\DeleteAction::make(),    // Hapus
    
    // Custom action
    Actions\Action::make('publish')
        ->label('Publish')
        ->icon('heroicon-o-check')
        ->action(fn ($record) => $record->update(['is_published' => true]))
        ->requiresConfirmation()
        ->color('success'),
])
```

> **⚠️ Perubahan Filament 5:** Semua action classes dipindahkan dari `Filament\Tables\Actions` ke `Filament\Actions`.

#### Bulk Actions (Massal)
```php
->bulkActions([
    Actions\BulkActionGroup::make([
        Actions\DeleteBulkAction::make(),
        
        // Custom bulk action
        Actions\BulkAction::make('publish')
            ->label('Publish Selected')
            ->action(fn ($records) => $records->each->update(['is_published' => true]))
            ->requiresConfirmation(),
    ]),
])
```

### 7.4 Header Actions

```php
// Di ListPosts.php
use Filament\Actions;  // ← Filament 5

protected function getHeaderActions(): array
{
    return [
        Actions\CreateAction::make(),
        
        Actions\Action::make('export')
            ->label('Export')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function () {
                // Logic export
            }),
    ];
}
```

### 7.5 Default Sort

```php
public static function table(Table $table): Table
{
    return $table
        ->defaultSort('created_at', 'desc')
        ->columns([...]);
}
```

---

## 8. Relasi

### 8.1 belongsTo (Select)

```php
// Di form Resource
Select::make('category_id')
    ->relationship('category', 'name')
    ->searchable()
    ->preload()
    ->required()
```

### 8.2 hasMany (RelationManager)

Buat RelationManager:
```bash
php artisan make:filament-relation-manager Post comments
```

Ini akan membuat `CommentRelationManager` yang bisa mengelola komentar dari halaman Post.

Daftarkan di Resource:
```php
public static function getRelations(): array
{
    return [
        PostResource\RelationManagers\CommentsRelationManager::class,
    ];
}
```

### 8.3 BelongsToMany (Multi-Select)

```php
// Di form Resource (untuk relasi many-to-many)
Select::make('tags')
    ->relationship('tags', 'name')
    ->multiple()
    ->searchable()
    ->preload()
```

---

## 9. Page Kustom

### 9.1 Membuat Page Kustom

```bash
php artisan make:filament-page Settings
```

### 9.2 Struktur File

```
app/Filament/Pages/
└── Settings.php
```

### 9.3 Contoh Page Sederhana

```php
<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Schemas\Schema;  // ← Filament 5
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 10;
    protected static string $view = 'filament.pages.settings';
}
```

### 9.4 View Blade

```blade
{{-- resources/views/filament/pages/settings.blade.php --}}
<x-filament-panels::page>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Settings</h1>
        <p>Konten halaman settings di sini.</p>
    </div>
</x-filament-panels::page>
```

---

## 10. Widget

### 10.1 Membuat Widget

```bash
php artisan make:filament-widget StatsOverview
```

### 10.2 StatsOverview Widget

```php
<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description('Blog posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Published', Post::where('is_published', true)->count())
                ->description('Live on site')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Unread Messages', Message::unread()->count())
                ->description('New messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
```

### 10.3 Chart Widget

```bash
php artisan make:filament-widget PostChart --type=Chart
```

```php
<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;

class PostChart extends ChartWidget
{
    protected static ?string $heading = 'Posts per Month';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Posts',
                    'data' => [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
```

---

## 11. Navigasi

### 11.1 Ikon (Heroicons)

Filament menggunakan [Heroicons](https://heroicons.com/). Gunakan prefix `heroicon-o-` untuk outline dan `heroicon-s-` untuk solid.

```php
// Contoh ikon
'heroicon-o-document-text'   // Dokumen
'heroicon-o-folder'          // Folder
'heroicon-o-briefcase'       // Briefcase
'heroicon-o-user'            // User
'heroicon-o-cog-6-tooth'     // Gear
'heroicon-o-home'            // Home
'heroicon-o-envelope'        // Email
'heroicon-o-chart-bar'       // Chart
```

### 11.2 Grup Navigasi

```php
// Di AdminPanelProvider
->navigationGroups([
    NavigationGroup::make()
        ->label('Content')
        ->icon('heroicon-o-document-text'),
    NavigationGroup::make()
        ->label('Portfolio')
        ->icon('heroicon-o-briefcase'),
    NavigationGroup::make()
        ->label('Settings')
        ->icon('heroicon-o-cog-6-tooth'),
])
```

### 11.3 Mengatur Urutan

```php
// Di Resource
protected static ?int $navigationSort = 1;  // Angka kecil = di atas
```

---

## 12. Hak Akses

### 12.1 Restrict Panel Access

Di `User.php`:
```php
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya admin yang bisa akses
        return $this->is_admin;
        
        // Atau dengan role
        return $this->hasRole('admin');
    }
}
```

### 12.2 Restrict Resource Access

Di Resource:
```php
public static function canViewAny(): bool
{
    return auth()->user()->can('view_posts');
}

public static function canCreate(): bool
{
    return auth()->user()->can('create_posts');
}

public static function canEdit($record): bool
{
    return auth()->user()->can('edit_posts');
}

public static function canDelete($record): bool
{
    return auth()->user()->can('delete_posts');
}
```

---

## 13. Perintah Penting

### Filament

```bash
# Install Filament
php artisan filament:install --panels

# Buat admin user
php artisan make:filament-user

# Promote user ke super admin
php artisan filament:promote --email=user@example.com

# Publish assets
php artisan filament:assets

# Publish translations
php artisan filament:translations

# Cache components
php artisan filament:cache-components

# Upgrade Filament
php artisan filament:upgrade
```

### Resource

```bash
# Buat resource
php artisan make:filament-resource ModelName

# Dengan generator (auto form & table)
php artisan make:filament-resource ModelName --generate

# Simple (tanpa view page)
php artisan make:filament-resource ModelName --simple

# Dengan soft deletes
php artisan make:filament-resource ModelName --soft-deletes

# Generate untuk model yang sudah ada
php artisan make:filament-resource ModelName --generate --model=ModelName
```

### Relation Manager

```bash
# Buat relation manager
php artisan make:filament-relation-manager ParentModel relationName

# Contoh: Post hasMany Comments
php artisan make:filament-relation-manager Post comments
```

### Pages & Widgets

```bash
# Buat page kustom
php artisan make:filament-page PageName

# Buat settings page
php artisan make:filament-page Settings --type=Settings

# Buat widget stats
php artisan make:filament-widget StatsOverview

# Buat widget chart
php artisan make:filament-widget PostChart --type=Chart

# Buat widget table
php artisan make:filament-widget RecentPosts --type=Table
```

---

## 14. Tips & Trik

### 14.1 Auto Slug dari Title

```php
TextInput::make('title')
    ->required()
    ->live(onBlur: true)
    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) =>
        $set('slug', \Illuminate\Support\Str::slug($state))
    ),

TextInput::make('slug')
    ->required()
    ->unique(ignoreRecord: true)
```

### 14.2 Hitung Reading Time Otomatis

Di Model `Post.php`:
```php
protected static function booted(): void
{
    static::saving(function (Post $post) {
        if ($post->isDirty('content')) {
            $post->reading_time = max(1, (int) ceil(
                str_word_count(strip_tags($post->content)) / 200
            ));
        }
    });
}
```

### 14.3 Scope Default di Table

```php
public static function table(Table $table): Table
{
    return $table
        ->query(fn () => Post::query()->where('is_published', true))
        ->columns([...]);
}
```

### 14.4 Format Tanggal Indonesia

```php
TextColumn::make('created_at')
    ->dateTime('d MMMM yyyy', 'id_ID')
    ->sortable()
```

Di `config/app.php`:
```php
'locale' => 'id',
'faker_locale' => 'id_ID',
```

### 14.5 Badge dengan Warna Kustom

```php
TextColumn::make('category.name')
    ->badge()
    ->color(fn ($record) => $record->category->color ?? 'gray')
```

### 14.6 Custom Action dengan Modal

```php
use Filament\Actions;  // ← Filament 5

Actions\Action::make('publish')
    ->label('Publish')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->requiresConfirmation()
    ->modalHeading('Publish Post')
    ->modalDescription('Are you sure you want to publish this post?')
    ->modalSubmitActionLabel('Yes, publish')
    ->action(function ($record) {
        $record->update([
            'is_published' => true,
            'published_at' => now(),
        ]);
    })
```

### 14.7 Global Search

Filament mendukung global search (Ctrl+K). Atur di Resource:

```php
protected static ?string $recordTitleAttribute = 'title';

// Atau custom
public static function getGloballySearchableAttributes(): array
{
    return ['title', 'excerpt', 'content'];
}

public static function getGlobalSearchResultUrl(Model $record): string
{
    return static::getUrl('edit', ['record' => $record]);
}
```

### 14.8 Export/Import Data

Install package:
```bash
composer require pxlrbt/filament-excel
```

Di Resource:
```php
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

->bulkActions([
    ExportBulkAction::make(),
])
```

---

## 15. Perubahan Filament 5 (Breaking Changes)

Jika Anda upgrade dari Filament 3/4 ke Filament 5, ada beberapa **breaking changes** yang perlu diperhatikan:

### 15.1 Namespace Table Actions

```php
// ❌ FILAMENT 3/4 (LAMA)
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

// ✅ FILAMENT 5 (BARU)
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
```

Atau gunakan prefix:
```php
use Filament\Actions;

Actions\EditAction::make()
Actions\DeleteAction::make()
```

### 15.2 Namespace Section Component

```php
// ❌ FILAMENT 3/4 (LAMA)
use Filament\Forms\Components\Section;

// ✅ FILAMENT 5 (BARU)
use Filament\Schemas\Components\Section;
```

### 15.3 Form Method Signature

```php
// ❌ FILAMENT 3/4 (LAMA)
use Filament\Forms\Form;

public static function form(Form $form): Form
{
    return $form->schema([...]);
}

// ✅ FILAMENT 5 (BARU)
use Filament\Schemas\Schema;

public static function form(Schema $schema): Schema
{
    return $schema->schema([...]);
}
```

### 15.4 RichEditor Toolbar Buttons

```php
// ❌ FILAMENT 3/4 (LAMA)
->toolbarButtons([
    'heading',  // Tidak ada di Filament 5
])

// ✅ FILAMENT 5 (BARU)
->toolbarButtons([
    'h1', 'h2', 'h3', 'h4', 'h5', 'h6',  // Heading dipecah
])
```

### 15.5 Ringkasan Perubahan

| Komponen | Filament 3/4 | Filament 5 |
|----------|--------------|------------|
| Table Actions | `Filament\Tables\Actions\*` | `Filament\Actions\*` |
| Section | `Filament\Forms\Components\Section` | `Filament\Schemas\Components\Section` |
| Form type | `Filament\Forms\Form` | `Filament\Schemas\Schema` |
| Heading button | `'heading'` | `'h1'`, `'h2'`, `'h3'`, dll |

---

## Referensi

- [Filament Documentation](https://filamentphp.com/docs)
- [Heroicons](https://heroicons.com/)
- [Filament Plugins](https://filamentphp.com/plugins)
- [Laravel Documentation](https://laravel.com/docs)

---

*Dokumentasi ini dibuat pada Juni 2026 untuk project adamilmi.me*
