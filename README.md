# adamilmi.me

Personal landing page dan blog untuk Muhammad Adam Fahmil 'Ilmi - Software Engineer di Universitas Sebelas Maret.

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 13 |
| Admin Panel | Filament 5 |
| CSS | TailwindCSS 3 |
| Database | MySQL |
| Font | Inter + Playfair Display + JetBrains Mono |
| Icons | Heroicons (via Filament) |
| Animation | AOS (Animate on Scroll) |

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL >= 8.0
- Git

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/adamfahmil96/adamilmi.git
cd adamilmi
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Setup

```bash
cp .env.example .env
```

Edit `.env` sesuai konfigurasi database Anda:

```env
APP_NAME="Adam Fahmil"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_adamilmi
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migration

```bash
php artisan migrate
```

### 7. Seed Database

```bash
php artisan db:seed
```

Seeder yang tersedia:
- `CategorySeeder` - 5 kategori blog
- `SkillSeeder` - 40+ skills
- `ExperienceSeeder` - 8 pengalaman kerja
- `EducationSeeder` - 3 riwayat pendidikan
- `CertificationSeeder` - 2 sertifikasi
- `ProjectSeeder` - 3 sample project
- `PostSeeder` - 3 sample blog posts

Seeder bersifat **idempotent** (aman dijalankan berulang tanpa duplikasi).

### 8. Create Storage Link

```bash
php artisan storage:link
```

### 9. Publish Filament Assets

```bash
php artisan filament:assets
```

### 10. Build Frontend Assets

```bash
npm run build
```

### 11. Start Development Server

```bash
php artisan serve
```

Akses website di: `http://localhost:8000`

---

## Admin Panel

> **Pemula di Filament?** Baca tutorial lengkap dasar-dasar Filament di [`docs/FILAMENT_TUTORIAL.md`](docs/FILAMENT_TUTORIAL.md) sebelum mulai development.

### Access

- URL: `http://localhost:8000/admin`
- Email: `admin@adamilmi.me`
- Password: `password`

### Filament Resources

| Resource | Menu | Description |
|---|---|---|
| PostResource | Content > Blog Posts | Kelola artikel blog |
| CategoryResource | Content > Categories | Kelola kategori blog |
| MessageResource | Content > Messages | Pesan dari form kontak |
| ProjectResource | Portfolio > Projects | Kelola project portfolio |
| ExperienceResource | Portfolio > Experience | Kelola pengalaman kerja |
| SkillResource | Portfolio > Skills | Kelola skills/tech stack |
| EducationResource | Portfolio > Education | Kelola riwayat pendidikan |
| CertificationResource | Portfolio > Certifications | Kelola sertifikasi |

### Filament Commands

Untuk penjelasan lengkap setiap command, arsitektur, dan cara penggunaannya, lihat [`docs/FILAMENT_TUTORIAL.md`](docs/FILAMENT_TUTORIAL.md).

#### Resource Management
```bash
# Create new resource
php artisan make:filament-resource ModelName --generate

# Create resource with soft deletes
php artisan make:filament-resource ModelName --soft-deletes

# Create resource without form/table (blank)
php artisan make:filament-resource ModelName --simple
```

#### Pages
```bash
# Create custom page
php artisan make:filament-page PageName

# Create settings page
php artisan make:filament-page Settings --type=Settings

# Create widget
php artisan make:filament-widget WidgetName
```

#### User Management
```bash
# Create new admin user
php artisan make:filament-user

# Promote user to super admin
php artisan filament:promote --email=user@example.com
```

#### Assets
```bash
# Publish Filament assets
php artisan filament:assets

# Publish Filament translations
php artisan filament:translations
```

#### Cache & Optimization
```bash
# Clear Filament cache
php artisan filament:cache-components

# Upgrade Filament (after composer update)
php artisan filament:upgrade
```

---

## Development Commands

### Run Development Server (All-in-One)

```bash
composer dev
```

Ini akan menjalankan:
- `php artisan serve`
- `npm run dev`

### Run Separately

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

### Database Commands

```bash
# Fresh migrate (drop all tables + re-migrate)
php artisan migrate:fresh

# Fresh migrate + seed
php artisan migrate:fresh --seed

# Run seeder only
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=SkillSeeder

# Rollback migration
php artisan migrate:rollback

# Check migration status
php artisan migrate:status
```

### Cache Commands

```bash
# Clear all cache
php artisan optimize:clear

# Clear specific cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Cache for production
php artisan optimize
```

### Storage Commands

```bash
# Create storage symlink
php artisan storage:link

# Remove storage symlink
php artisan storage:unlink
```

---

## Project Structure

```
adamilmi/
├── app/
│   ├── Filament/
│   │   ├── Pages/
│   │   │   └── Dashboard.php
│   │   ├── Resources/
│   │   │   ├── PostResource.php
│   │   │   ├── CategoryResource.php
│   │   │   ├── ProjectResource.php
│   │   │   ├── ExperienceResource.php
│   │   │   ├── SkillResource.php
│   │   │   ├── EducationResource.php
│   │   │   ├── CertificationResource.php
│   │   │   └── MessageResource.php
│   │   └── Widgets/
│   │       └── StatsOverview.php
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php
│   │       ├── BlogController.php
│   │       └── ContactController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Post.php
│   │   ├── Category.php
│   │   ├── Project.php
│   │   ├── Experience.php
│   │   ├── Skill.php
│   │   ├── Education.php
│   │   ├── Certification.php
│   │   └── Message.php
│   └── Providers/
│       ├── AppServiceProvider.php
│       └── Filament/
│           └── AdminPanelProvider.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── components/
│       │   ├── layout.blade.php
│       │   ├── navbar.blade.php
│       │   ├── footer.blade.php
│       │   └── sections/
│       │       ├── hero.blade.php
│       │       ├── about.blade.php
│       │       ├── skills.blade.php
│       │       ├── portfolio.blade.php
│       │       ├── experience.blade.php
│       │       ├── blog-preview.blade.php
│       │       └── contact.blade.php
│       ├── blog/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── pages/
│           └── home.blade.php
├── routes/
│   ├── web.php
│   └── console.php
└── public/
    └── images/
```

---

## Color Scheme

Primary color: **Indigo Blue (#4F46E5)**

```
Primary-50:  #EEF2FF
Primary-100: #E0E7FF
Primary-200: #C7D2FE
Primary-300: #A5B4FC
Primary-400: #818CF8
Primary-500: #6366F1
Primary-600: #4F46E5
Primary-700: #4338CA
Primary-800: #3730A3
Primary-900: #312E81
```

---

## Routes

| Method | URI | Name | Description |
|---|---|---|---|
| GET | `/` | `home` | Landing page |
| GET | `/blog` | `blog.index` | Blog list |
| GET | `/blog/{slug}` | `blog.show` | Blog detail |
| GET | `/blog/category/{slug}` | `blog.category` | Blog by category |
| POST | `/contact` | `contact.store` | Submit contact form |
| GET | `/admin` | - | Admin panel |

---

## Production Deployment

### Build Assets

```bash
npm run build
```

### Optimize Laravel

```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables

Pastikan di production:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://adamilmi.me
```

---

## Documentation

| File | Deskripsi |
|---|---|
| [`docs/FILAMENT_TUTORIAL.md`](docs/FILAMENT_TUTORIAL.md) | Tutorial dasar Filament PHP (instalasi, arsitektur, CRUD, form, table, widget, dll) |

---

## License

MIT License

---

## Author

**Muhammad Adam Fahmil 'Ilmi**
- GitHub: [adamfahmil96](https://github.com/adamfahmil96)
- LinkedIn: [adamfahmil](https://linkedin.com/in/adamfahmil)
- Email: adamfahmil020@gmail.com
