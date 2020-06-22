Author: Medardo Manuel Juárez González

Guia de despliegue para el sistema
Linux (Ubuntu y derivados)
clonar el repositorio en una carpeta publica de acceso por apache

copiar archivo .env.example a .env Colocar accesos a BD

Crear carpeta vendor mkdir vendor

Dar permisos recursivos a vendor sudo chmod -cR vendor

Ejecutar composer composer install

Proporcionar token de autenticacion de Git Hub

Dar permisos a carpetas sudo chmod -cR 777 storage/framework/ sudo chmod -cR 777 storage/logs

Correr migraciones necesarias para el funcionamiento del sistema php artisan migrate.



