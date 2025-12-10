# 🦆 Quacker

> Aplicación web estilo X (Twitter) desarrollada con Laravel, con enfoque en backend.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://www.php.net)
[![SQLite](https://img.shields.io/badge/SQLite-3.26.0+-green.svg)](https://www.sqlite.org)
[![Release](https://img.shields.io/github/v/release/mariomo16/Quacker)](https://github.com/mariomo16/Quacker/releases)
[![Last Commit](https://img.shields.io/github/last-commit/mariomo16/Quacker)](https://github.com/mariomo16/Quacker/commits/main)
[![Issues](https://img.shields.io/github/issues/mariomo16/Quacker)](https://github.com/mariomo16/Quacker/issues)

## Instalación

### Clonar el repositorio y entrar a la carpeta

```bash
git clone https://github.com/mariomo16/Quacker.git && cd Quacker
```

### Configurar el proyecto y compilar assets

```bash
composer run setup
```

> [!NOTE]
> Este script prepara todo el proyecto por primera vez: instala dependencias de PHP y Node.js, copia el archivo .env, genera la key de Laravel, ejecuta las migraciones y compila los assets.

### Ejecutar el entorno de desarrollo

```bash
php artisan serve
```
> [!WARNING]
> Para desarrollo activo, se recomienda usar:
>
> ```bash
> composer run dev
> ```

La aplicación estará disponible en `http://127.0.0.1:8000/`


## Gestión de base de datos

Puedes visualizar la base de datos SQLite (`database/database.sqlite`) con:

-   [DBeaver](https://dbeaver.io) (gratuito, multiplataforma)
-   [DB Browser for SQLite](https://sqlitebrowser.org) (gratuito, específico SQLite)
-   [TablePlus](https://tableplus.com) (freemium, interfaz moderna)

## Equipo de Desarrollo

Desarrollado por [@mariomo16](https://github.com/mariomo16), [@alfonsogomez45](https://github.com/alfonsogomez45) y [@ByAlberto](https://github.com/ByAlberto).
