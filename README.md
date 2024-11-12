# Proyecto de Gestión de Clientes, Facturas y Productos

Este proyecto es una aplicación web para la gestión de clientes, facturación y
productos, diseñada con Laravel en el backend y Node.js para la autenticación de
usuarios. La aplicación permite la creación, edición, eliminación y consulta de
clientes y facturas, generación de archivos PDF para facturas, y envío de estos
por correo electrónico.

---

## Tecnologías Utilizadas

- **Backend**: Laravel 10
- **Frontend**: JavaScript y Blade
- **Base de Datos**: MySQL 8.0
- **Autenticación**: Node.js, Express, JSON Web Token (JWT)
- **Generación de PDF**: DomPDF para la creación de archivos PDF en Laravel
- **Correo**: Laravel Mailables para envío de PDFs generados
- **Otros**:
  - **Bootstrap CSS** para diseño
  - **Faker** para generación de datos de prueba en seeders

---

## Requisitos Previos

### Backend (Laravel)

- **PHP**: >= 8.1
- **Composer**: >= 2.0
- **MySQL**: >= 8.0

### Dependencias de Laravel

- **Laravel DomPDF** para generación de PDFs
- **Laravel Mailables** para envío de correo electrónico

### Backend (Node.js)

- **Node.js**: >= 16.0

### Dependencias de Node.js

- **Express** para el servidor de autenticación

---

## Instalación

### Paso 1: Clonar el Repositorio

Clona el repositorio en tu máquina local:

git clone https://github.com/janusa13/SoyChu.git cd SoyChu

### Paso 2: Configurar el Backend de Laravel

Instalar dependencias de Laravel composer install

Configurar el archivo .env Copia el archivo .env.example y renómbralo como .env:

Configura las variables de entorno, especialmente las de la base de datos y
correo.

Generar la clave de la aplicación php artisan key:generate

Configurar las migraciones y seeders Ejecuta las migraciones para crear las
tablas en la base de datos:

php artisan migrate

Generación de PDFs y envío de correos La generación de PDFs utiliza DomPDF.
Asegúrate de tener laravel-dompdf instalado:

composer require barryvdh/laravel-dompdf

El envío de correos utiliza Mailables de Laravel. Verifica que las credenciales
de correo estén correctas en el archivo .env.

### Paso 3: Configurar el Servidor Node.js

Instalar dependencias de Node.js npm install

Ejecutar el servidor de autenticación npm run dev

### Paso 4: Ejecucion de la aplicación:

Inicia el servidor de Laravel: php artisan serve

Accede a la aplicación en tu navegador en: http://localhost:8000.
