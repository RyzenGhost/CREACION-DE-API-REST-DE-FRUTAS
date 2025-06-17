# API REST de Frutas 🍉

Este proyecto es una API REST desarrollada en Laravel para gestionar frutas y sus categorías.

## 🚀 Requisitos

- PHP 8.1+
- Composer
- XAMPP o Laravel Valet
- SQLite 

## ⚙️ Instalación

```bash
git clone https://github.com/RyzenGhost/CREACION-DE-API-REST-DE-FRUTAS.git
cd CREACION-DE-API-REST-DE-FRUTAS
composer install
cp .env.example .env
php artisan key:generate

Luego, edita el archivo .env para configurar la base de datos SQLite

DB_CONNECTION=sqlite
DB_DATABASE=/ruta/a/tu/database.sqlite

Crea el archivo database.sqlite si usas SQLite:
touch database/database.sqlite

Migraciones y servidor
Ejecuta las migraciones y levanta el servidor local con:

php artisan migrate
php artisan serve

 Endpoints

 Base URL: http://localhost:8000/api/frutas

Método	Endpoint	Descripción
GET	/api/frutas	Listar todas las frutas
POST	/api/frutas	Crear nueva fruta
GET	/api/frutas/{id}	Ver una fruta específica
PUT	/api/frutas/{id}	Actualizar una fruta
DELETE	/api/frutas/{id}	Eliminar una fruta

Ejemplos con Curl

Para crear furta:

curl -X POST http://localhost:8000/api/frutas \
     -H "Content-Type: application/json" \
     -d '{"nombre": "Manzana", "categoria_id": 1, "precio": 0.5}'


Para obtener la frua:
curl http://localhost:8000/api/frutas
