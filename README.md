# CCTV Dashboard Yogyakarta

Aplikasi **Dashboard Monitoring CCTV** untuk Daerah Istimewa Yogyakarta.  
Dibangun dengan Laravel 11, TailwindCSS, dan Blade, aplikasi ini memungkinkan pemantauan, pengelolaan, dan visualisasi lokasi CCTV secara real-time.

---

## Tech Stack

-   **Backend:** Laravel 11 (PHP 8+)
-   **Frontend:** Blade, TailwindCSS, Toastify.js, Leaflet.js
-   **Database:** MySQL/MariaDB
-   **Javascript:** Fetch API (AJAX), Toastify.js
-   **Map:** Leaflet (OpenStreetMap)
-   **Icons:** Lucide, FontAwesome

---

## Fitur Utama

-   **Landing Page:**
    -   Hero section, profil perusahaan, logo mitra, dan navigasi modern.
-   **Dashboard CCTV:**
    -   Sidebar daftar CCTV.
    -   Grid preview CCTV (max 3 kolom).
    -   Modal pop-up untuk melihat stream CCTV.
-   **Peta GIS CCTV:**
    -   Visualisasi lokasi CCTV di peta interaktif.
    -   Popup marker menampilkan nama, lokasi, dan stream CCTV.
-   **Manajemen CCTV (CRUD):**
    -   Tambah, edit, hapus data CCTV via modal.
    -   Tabel dinamis tanpa reload (AJAX).
    -   Konfirmasi hapus dengan modal.
    -   Notifikasi toast untuk feedback aksi user.

---

## API Endpoint

Semua endpoint menerima dan mengembalikan data dalam format JSON.

| Method | Endpoint     | Deskripsi       | Body Params                        |
| ------ | ------------ | --------------- | ---------------------------------- |
| GET    | `/cctv`      | List semua CCTV | -                                  |
| POST   | `/cctv`      | Tambah CCTV     | `name`, `lat`, `lng`, `stream_url` |
| PUT    | `/cctv/{id}` | Update CCTV     | `name`, `lat`, `lng`, `stream_url` |
| DELETE | `/cctv/{id}` | Hapus CCTV      | -                                  |

**Contoh request tambah CCTV:**

```json
POST /cctv
{
  "name": "CCTV Malioboro",
  "lat": -7.7925,
  "lng": 110.3657,
  "stream_url": "https://example.com/stream"
}
```

---

## Instalasi & Setup

1. **Clone repo & install dependency**
    ```bash
    git clone <repo-url>
    cd dashboard-monitoring-cctv
    composer install
    npm install && npm run build
    cp .env.example .env
    ```
2. **Atur database di `.env` lalu migrate**
    ```bash
    php artisan migrate
    ```
3. **Jalankan server**
    ```bash
    php artisan serve
    ```
4. **Akses aplikasi**
    - Landing page: `http://localhost:8000/`
    - Dashboard: `http://localhost:8000/dashboard`
    - Map GIS: `http://localhost:8000/map`
    - Manage CCTV: `http://localhost:8000/cctv`

---

## Struktur Folder Penting

-   `resources/views/` : Blade templates (welcome, dashboard, map, cctv)
-   `app/Http/Controllers/` : Controller logic
-   `app/Models/` : Model Eloquent
-   `routes/web.php` : Routing utama aplikasi

---

## Catatan

-   Pastikan file asset (logo, gambar, dsb) ada di `public/assets/`.
-   Untuk streaming CCTV, gunakan URL yang mendukung embed/iframe.
-   Perhatikan format saat mengisi langtitude dan latitude 
