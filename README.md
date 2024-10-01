<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# TestNetComerce API

Este proyecto es una API desarrollada en Laravel 10 que permite gestionar compañías y tareas.

## Requisitos

- PHP 8.x
- Composer
- MySQL o cualquier otro sistema de base de datos compatible

## Instalación

1. Clonar el repositorio:
    ```bash
    git clone https://github.com/AdrianSoberanoPalomares/testnetcomerce.git
    ```
2. Navegar a la carpeta del proyecto:
    ```bash
    cd testnetcomerce
    ```
3. Instalar dependencias:
    ```bash
    composer install
    ```
4. Crear el archivo `.env` a partir del archivo de ejemplo:
    ```bash
    cp .env.example .env
    ```
5. Configurar la base de datos en el archivo `.env`:
    ```
    DB_DATABASE=testnetcomerce
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6. Ejecutar migraciones para crear las tablas:
    ```bash
    php artisan migrate
    ```
7. Ejecutar seeders para poblar la base de datos con datos de prueba:
    ```bash
    php artisan db:seed
    ```
8. Generar la clave de aplicación:
    ```bash
    php artisan key:generate
    ```

## Uso de la API en POSTMAN

### Listar compañías
**GET** `/companies`
y
**POST** ` /tasks/create

Respuesta:
```json
[
  {
    "id": 1,
    "name": "Netcommerce",
    "tasks": [
      {
        "id": 1,
        "name": "task 1",
        "description": "task content",
        "user": "Akira",
        "is_completed": 0,
        "start_at": "2023-08-04 00:00:00",
        "expired_at": "2023-08-07 00:00:00"
      },
      ...
    ]
  },
  ...
]
