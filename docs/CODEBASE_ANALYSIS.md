# Codebase Analysis Report

**Project:** Adam Ilmi Website (adamilmi.me)
**Stack:** Laravel 13 + Filament 5 + TailwindCSS 3.4 + Alpine.js 3.13
**Analysis Date:** 11 Juli 2026

---

## 1. Arsitektur Aplikasi

### Overview

Aplikasi ini adalah **personal portfolio + blog** untuk Muhammad Adam Fahmil 'Ilmi, dibangun dengan:

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 13, PHP 8.2+ |
| Admin Panel | Filament 5 |
| Frontend | TailwindCSS 3.4, Alpine.js 3.13, Vite 5 |
| Database | MySQL |
| Cache | Database |
| Queue | Database |

### Database Entities (8 domain tables + 3 system tables)

| Tabel | Fungsi |
|-------|--------|
| `users` | Autentikasi admin |
| `categories` | Kategori blog post |
| `posts` | Blog posts (linked to categories) |
| `projects` | Portfolio projects |
| `skills` | Technical skills |
| `experiences` | Work experience |
| `education` | Education history |
| `certifications` | Certifications |
| `messages` | Contact form submissions |
| `cache` / `cache_locks` | Laravel cache |
| `jobs` / `job_batches` / `failed_jobs` | Laravel queue |

### Routes

| Method | URI | Controller | Name |
|--------|-----|-----------|------|
| GET | `/` | `HomeController@index` | `home` |
| GET | `/blog` | `BlogController@index` | `blog.index` |
| GET | `/blog/category/{category:slug}` | `BlogController@category` | `blog.category` |
| GET | `/blog/{post:slug}` | `BlogController@show` | `blog.show` |
| POST | `/contact` | `ContactController@store` | `contact.store` |
| GET | `/admin` | Filament Panel | Admin panel |

### Filament Resources (8 resources)

1. **PostResource** — CRUD blog posts
2. **CategoryResource** — CRUD categories
3. **ProjectResource** — CRUD portfolio projects
4. **SkillResource** — CRUD skills
5. **ExperienceResource** — CRUD work experiences
6. **EducationResource** — CRUD education entries
7. **CertificationResource** — CRUD certifications
8. **MessageResource** — View contact messages (read-only)

---

## 2. Analisis Frontend

### Landing Page

**Struktur:** Komponen-based, terdiri dari:
- Hero section (with code block decoration)
- About section
- Skills section
- Portfolio section (featured projects)
- Experience section
- Blog preview (latest 3 posts)
- Contact section

**Color Scheme:** Indigo primary (`#6366F1`), dark mode via class strategy

**Fonts:**
- Inter (body)
- Playfair Display (headings)
- JetBrains Mono (code)

### Issues Found

| # | Issue | Severity | Lokasi |
|---|-------|----------|--------|
| F1 | Tailwind CDN via `<script>` — tidak optimal untuk production | HIGH | `layout.blade.php:17` |
| F2 | AOS (Animate On Scroll) dari unpkg CDN — external dependency tanpa integrity hash | MEDIUM | `layout.blade.php:60,271` |
| F3 | Google Fonts dari external CDN — 3 font families = 3 network requests | MEDIUM | `layout.blade.php:14` |
| F4 | Tailwind config duplikat — ada di `tailwind.config.js` DAN di `<script>` layout | MEDIUM | `layout.blade.php:18-48` |
| F5 | Custom CSS inline ~200 baris — harusnya di file terpisah agar ter-cache | LOW | `layout.blade.php:63-263` |
| F6 | Dark mode toggle script inline — duplicated logic | LOW | `navbar.blade.php:48-97` |

### Admin Panel (Filament 5)

**Konfigurasi:**
- Top navigation + sidebar collapsible
- Navigation groups: Content, Portfolio, Settings
- Primary color: Indigo
- Font: Inter
- Custom render hook untuk TipTap code block (Tab indentation)

| # | Issue | Severity | Lokasi |
|---|-------|----------|--------|
| A1 | `canAccessPanel()` selalu return true | CRITICAL | `User.php:34-37` |
| A2 | Tidak ada 2FA | MEDIUM | `AdminPanelProvider.php` |
| A3 | Tidak ada IP allowlist untuk admin panel | LOW | - |

---

## 3. Code Review

### Architecture — BAGUS
- MVC pattern clean, proper separation
- Models menggunakan `$fillable`, scopes, casts
- Filament Resources ter-organize per entity
- Controllers thin, business logic di model scopes

### Readability — BAGUS
- Naming conventions konsisten (camelCase)
- Code terstruktur, tidak ada file > 200 lines
- Blade components properly composed

### Issues

| # | Issue | Severity | Lokasi |
|---|-------|----------|--------|
| C1 | Lazy loading hanya dicegah di non-production | MEDIUM | `AppServiceProvider.php:18` |
| C2 | `BlogController::category()` — `$categories` di-load tapi tidak dipakai | LOW | `BlogController.php:55` |
| C3 | ContactController bisa pakai Form Request langsung | LOW | `ContactController.php:13-18` |
| C4 | Tidak ada test sama sekali | MEDIUM | `tests/` |

---

## 4. Performance Analysis

### Query Performance

| # | Issue | Severity | Lokasi |
|---|-------|----------|--------|
| P1 | HomeController::index() — 4 queries terpisah, bisa di-cache | MEDIUM | `HomeController.php:15-18` |
| P2 | Blog search — `LIKE '%search%'` di 3 columns | HIGH | `BlogController.php:17-21` |
| P3 | Lazy loading di production — N+1 queries tidak terdeteksi | MEDIUM | `AppServiceProvider.php:18` |
| P4 | Category::orderBy('name')->get() di setiap blog request | LOW | `BlogController.php:25,55` |

### Asset Performance

| # | Issue | Severity | Lokasi |
|---|-------|----------|--------|
| P5 | Tailwind CDN `<script>` — ~300KB JS di-parse di setiap request | HIGH | `layout.blade.php:17` |
| P6 | 3 external font requests ke Google Fonts | MEDIUM | `layout.blade.php:14` |
| P7 | AOS library dari unpkg — tanpa SRI hash | MEDIUM | `layout.blade.php:60` |
| P8 | Tidak ada image optimization | MEDIUM | - |
| P9 | Tidak ada caching headers untuk static assets | LOW | - |

### Estimated Page Load Impact

| Resource | Size (est.) | Blocking? |
|----------|------------|-----------|
| Tailwind CDN JS | ~300KB | Yes (parser) |
| Google Fonts CSS + WOFF2 | ~150KB | Yes (render) |
| AOS CSS + JS | ~30KB | Yes (parser) |
| Custom inline CSS | ~5KB | Yes (parser) |
| **Total blocking** | **~485KB** | - |

---

## 5. Rekomendasi Deployment

### Microsoft Azure Student vs Shared Hosting

| Aspek | Azure Student | Shared Hosting |
|-------|--------------|----------------|
| Cost | $100 kredit gratis/tahun | ~Rp 50-150rb/bulan |
| Database | Azure Database for MySQL (managed) | MySQL biasa |
| PHP Support | Azure App Service / VM (full control) | PHP 8.2 biasanya tersedia |
| SSL | Free via App Service / Let's Encrypt | Free via cPanel Let's Encrypt |
| Deployment | Git deploy, CI/CD pipeline | FTP / cPanel |
| Scalability | Mudah scale up/down | Terbatas |
| Performance | SSD, CDN built-in | Shared resources |
| Filament 5 | Full support (queue, cache, storage) | Queue & horizon terbatas |
| Learning Curve | Tinggi | Rendah |

### Rekomendasi: Azure Student

**Alasan:**
1. Laravel/Filament butuh queue worker, Redis/cache, dan storage link
2. Kredensial Azure Student berharga untuk portofolio & CV
3. Free $100/tahun cukup untuk App Service B1 + Azure Database for MySQL
4. CI/CD pipeline bisa langsung dari GitHub Actions ke Azure

**Setup yang direkomendasikan:**
```
Azure App Service (B1)     → Laravel app
Azure Database for MySQL   → Database
Azure Blob Storage         → File uploads (storage)
GitHub Actions             → CI/CD
Let's Encrypt (via App Service) → SSL
```
