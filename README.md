<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalasi

Update package via composer

```bash
composer update
```

### Penggunaan Auto Generate API
Jalankan perintah berikut:
```bash
php artisan scribes:generate-module --name={ModuleName} --table={table_names} --api
```
- Ganti `{table_names}` dengan nama table yang ingin di generate.
- Ganti `{ModuleName}` dengan nama module yang akan dibuat. Contoh: Academic, Report, etc.
Otomatis akan membuat direktori module, contoh : Academic, dan didalamnya ada folder controller, services, repositories, route, config, model & presenters.

- Jika ingin generate controller, request, repository & service satu-satu gunakan command:

    ```bash
    php artisan scribes:make-module --name=Perkuliahan --table={table_name} --controller or --request or --repository or --service
    ```
    tag --controller --request --repository --service bersifat opsional, bisa pilih salah satu.


    Ganti `{table_name}` dengan nama table yang ingin di generate.

### Pembaruan API
Untuk memperbarui API jalankan perintah berikut:
```bash
php artisan l5-swagger:generate
```

### Warning
Jangan lupa tambahkan schema untuk setiap Model yang akan dibuat endpoint-nya.